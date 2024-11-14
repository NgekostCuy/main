<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use App\Models\Images;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        return view('dashboard');
    }
    
    function admin() {
        $list_kost = Kost::all();
        return view('dashboard.admin', compact('list_kost'));
    }
    
    function user() {
        return view('dashboard.user');
    }
    function owner() {
        // Mendapatkan username user yang sedang login
        $username = auth()->user()->name;
        // Mengambil data kost yang dimiliki oleh user dengan username tersebut
        $list_kost = Kost::where('nama_pemilik', $username)->get();
        return view('dashboard.owner', compact('list_kost'));
    }

    function add_kost() {
        return view('owner.add_kost');
    }

    function store(Request $request)
    {
        // Membuat instance baru dari Kost dengan data inputan
        $kost = Kost::create([
            "nama_kost" => $request->nama_kost,
            "deskripsi_kost" => $request->deskripsi_kost,
            "peraturan_kost" => $request->peraturan_kost,
            "fasilitas_kost" => $request->fasilitas_kost,
            "nama_pemilik" => $request->nama_pemilik,
            "no_telepon" => $request->no_telepon,
            "harga" => $request->harga,
            "jumlah_kamar" => $request->jumlah_kamar,
            "cover" => $request->hasFile("cover")
        ]);

        // Menangani upload cover image
        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("cover/"), $imageName);
            $kost->cover = $imageName; // Set nama cover image pada instance kost
        }

        // Menyimpan instance kost
        $kost->save();

        // Menangani upload tambahan images
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("/images"), $imageName);

                // Membuat instance baru untuk setiap gambar yang diupload
                Images::create([
                    "kost_id" => $kost->id, // Menggunakan ID kost yang baru saja disimpan
                    "image" => $imageName,
                ]);
            }
        }

        // Mengarahkan ke halaman awal
        return redirect("dashboard/owner");
    }

    public function destroy($id)
    {
        $kost = Kost::findOrFail($id); // Mencari kost berdasarkan ID
        $kost->delete(); // Menghapus data kost
        return redirect()->route('dashboard.owner')->with('success', 'Kost berhasil dihapus.'); // Redirect ke rute owner dengan pesan sukses
    }


    public function edit($id){
        $kost = Kost::findOrFail($id);
        return view('owner.edit_kost', compact('kost'));
    }

    public function update(Request $request, $id)
{
    // Mencari kost berdasarkan ID
    $kost = Kost::findOrFail($id);

    // Update data kost dengan data inputan baru
    $kost->update([
        "nama_kost" => $request->nama_kost,
        "deskripsi_kost" => $request->deskripsi_kost,
        "peraturan_kost" => $request->peraturan_kost,
        "fasilitas_kost" => $request->fasilitas_kost,
        "nama_pemilik" => $request->nama_pemilik,
        "no_telepon" => $request->no_telepon,
        "harga" => $request->harga,
        "jumlah_kamar" => $request->jumlah_kamar,
    ]);

    // Menangani upload cover image jika ada
    if ($request->hasFile('cover')) {
        // Proses upload gambar baru
        $file = $request->file('cover');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('cover/'), $imageName);

        // Update nama gambar cover pada data kost
        $kost->cover = $imageName;
    }

    // Menyimpan perubahan cover image
    $kost->save();

    // Menangani upload tambahan images jika ada
    if ($request->hasFile('images')) {
        $files = $request->file('images');
        foreach ($files as $file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/'), $imageName);

            // Menyimpan gambar tambahan ke tabel Images
            Images::create([
                'kost_id' => $kost->id, // ID kost yang baru saja diupdate
                'image' => $imageName,
            ]);
        }
    }

        // Mengarahkan kembali ke halaman owner/dashboard setelah update
        return redirect('dashboard/owner');
    }


    function logout(){
        return('logout');
    }
}
