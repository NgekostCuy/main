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
        return view('dashboard.admin');
    }
    
    function user() {
        return view('dashboard.user');
    }
    function owner() {
        $kosti = Kost::all();
        return view('dashboard.owner', compact('kosti'));
    }

    function add_kost() {
        return view('owner.add_kost');
    }

    public function destroy($id)
    {
        $kost = Kost::findOrFail($id); // Mencari kost berdasarkan ID
        $kost->delete(); // Menghapus data kost
        return redirect()->route('dashboard.owner')->with('success', 'Kost berhasil dihapus.'); // Redirect ke rute owner dengan pesan sukses
    }


    public function submit_kost(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'peraturan' => 'required|string',
            'nama_pemilik' => 'required|string|max:255',
            'telepon' => 'required|string|regex:/^[0-9]{10,15}$/',
            'harga' => 'required|numeric',
            'total_kamar' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Menghandle file upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = ''; // Tindakan lain jika file tidak ditemukan
        }

        // Menyimpan data ke database
        $kost = new Kost();
        $kost->nama = $request->nama;
        $kost->deskripsi = $request->deskripsi;
        $kost->peraturan = $request->peraturan;
        $kost->nama_pemilik = $request->nama_pemilik;
        $kost->nomor_hp = $request->telepon;
        $kost->harga = $request->harga;
        $kost->jumlah_kamar = $request->total_kamar;
        $kost->image = $request->image; // Simpan nama file gambar
        $kost->save();

        // Redirect dengan pesan sukses
        return redirect('/dashboard/owner')->with('success', 'Data kost berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kost = Kost::findOrFail($id);
        return view('owner.edit_kost', compact('kost')); // Ganti dengan nama file view yang sesuai
    }

    // Mengupdate data kost
    public function update(Request $request, $id)
    {

        $kost = Kost::find($id);
        $kost->nama = $request->nama;
        $kost->deskripsi = $request->deskripsi;
        $kost->peraturan = $request->peraturan;
        $kost->nama_pemilik = $request->nama_pemilik;
        $kost->nomor_hp = $request->telepon;
        $kost->harga = $request->harga;
        $kost->jumlah_kamar = $request->total_kamar;
        $kost->image = $request->image;

        $kost->update(); // Simpan perubahan ke database

        return redirect('/dashboard/owner')->with('success', 'Data kost berhasil ditambahkan.');
    }

    
    

    function logout(){
        return('logout');
    }



}
