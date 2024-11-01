<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('dashboard');
    }
    
    function admin() {
        $kosti = Kost::all();
        return view('dashboard.admin', compact('kosti'));
    }
    
    function user() {
        return view('dashboard.user');
    }
    function owner() {
        // Mendapatkan username user yang sedang login
        $username = auth()->user()->name;
        // Mengambil data kost yang dimiliki oleh user dengan username tersebut
        $kosti = Kost::where('nama_pemilik', $username)->get();
        return view('dashboard.owner', compact('kosti'));
    }

    function add_kost() {
        return view('owner.add_kost');
    }

    public function submit_kost(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'peraturan' => 'required|string',
            'telepon' => 'required|string|max:15',
            'harga' => 'required|numeric',
            'total_kamar' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk multiple images
        ]);

        // Simpan data kost ke dalam tabel kost
        $kost = Kost::create([
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'peraturan' => $validatedData['peraturan'],
            'nama_pemilik' => auth()->user()->name,
            'nomor_hp' => $validatedData['telepon'],
            'harga' => $validatedData['harga'],
            'jumlah_kamar' => $validatedData['total_kamar'],
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('images')) {
            // Simpan setiap gambar yang diunggah
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/kost', 'public');

                // Simpan data gambar ke dalam tabel kost_images
                $kost->images()->create([
                    'file_name' => $image->getClientOriginalName(),
                    'file_path' => $path,
                ]);
            }
        }

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('/dashboard/owner')->with('success', 'Data kost berhasil ditambahkan.');
    }



    public function destroy($id)
    {
        $kost = Kost::findOrFail($id); // Mencari kost berdasarkan ID
        $kost->delete(); // Menghapus data kost
        return redirect()->route('dashboard.owner')->with('success', 'Kost berhasil dihapus.'); // Redirect ke rute owner dengan pesan sukses
    }


    public function edit($id)
    {
        $kost = Kost::findOrFail($id);
        return view('owner.edit_kost', compact('kost')); // Ganti dengan nama file view yang sesuai
    }

    // Mengupdate data kost
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'peraturan' => 'required|string',
            'telepon' => 'required|string|max:15',
            'harga' => 'required|numeric',
            'total_kamar' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk multiple images
        ]);
    
        // Temukan data kost berdasarkan ID
        $kost = Kost::findOrFail($id);
    
        // Update data kost
        $kost->nama = $validatedData['nama'];
        $kost->deskripsi = $validatedData['deskripsi'];
        $kost->peraturan = $validatedData['peraturan'];
        $kost->nama_pemilik = $validatedData['nama_pemilik'] ?? auth()->user()->name;
        $kost->nomor_hp = $validatedData['telepon'];
        $kost->harga = $validatedData['harga'];
        $kost->jumlah_kamar = $validatedData['total_kamar'];
        $kost->save(); // Simpan perubahan kost terlebih dahulu
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
        
                // Cek apakah penyimpanan gambar berhasil
                if ($path) {
                    // Simpan data gambar ke dalam tabel kost_images
                    $kost->images()->create([
                        'file_name' => $image->getClientOriginalName(),
                        'file_path' => $path,
                    ]);
                } else {
                    // Log atau tangani kesalahan jika penyimpanan gagal
                    \Log::error('Gambar gagal disimpan: ' . $image->getClientOriginalName());
                }
            }
        }

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('/dashboard/owner')->with('success', 'Data kost berhasil diperbarui.');
    }


    function logout(){
        return('logout');
    }
}
