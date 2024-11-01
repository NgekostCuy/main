<?php

namespace App\Http\Controllers;

use App\Models\data_kost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function owner(){
        return view('dashboard.owners');
    }

    // public function tambahKost(){
    //     return view('dashboard.tambahKostStep1');
    // }

    public function tambahKostStep1()
    {
        return view('dashboard.tambahKostStep1'); // Pastikan view ini ada
    }

    public function submitStep1(Request $request)
    {
        $request->session()->put('nama_kost', $request->nama_kost);
        $request->session()->put('jenis_kost', $request->jenis_kost);
        $request->session()->put('deskripsi_kost', $request->deskripsi_kost);
        $request->session()->put('peraturan_kost', $request->peraturan_kost);
        $request->session()->put('dibangun_tahun', $request->dibangun_tahun);
        $request->session()->put('nama_pengelola', $request->nama_pengelola);//as
        $request->session()->put('nomor_hp_pemilik', $request->nomor_hp_pemilik);//as
        $request->session()->put('alamat_kost', $request->alamat_kost);

        return redirect()->route('dashboard.tambahKostStep2');
    }

    public function tambahKostStep2()
    {
        return view('dashboard.tambahKostStep2'); // Pastikan view ini ada
    }

    public function submitStep2(Request $request)
    {
        $kost = new data_kost();
        $kost->nama_kost = $request->session()->get('nama_kost');
        $kost->jenis_kost = $request->session()->get('jenis_kost');
        $kost->deskripsi_kost = $request->session()->get('deskripsi_kost');
        $kost->peraturan_kost = json_encode($request->session()->get('peraturan_kost'));
        $kost->dibangun_tahun = $request->session()->get('dibangun_tahun');
        $kost->nama_pengelola = $request->session()->get('nama_pengelola');
        $kost->nomor_hp_pemilik = $request->session()->get('nomor_hp_pemilik');
        $kost->alamat_kost = $request->session()->get('alamat_kost');

        $kost->foto_bangunan_tampak_depan = $request->foto_bangunan_tampak_depan;
        $kost->foto_tampilan_dalam = $request->foto_tampilan_dalam;
        $kost->foto_bangunan_tampak_depan = $request->session()->get('foto_tampak_jalan');
        $kost->foto_tampilan_dalam = $request->session()->get('foto_depan_kamar');
        $kost->foto_bangunan_tampak_depan = $request->session()->get('foto_dalam_kamar');
        $kost->foto_tampilan_dalam = $request->session()->get('foto_kamar_mandi');
        $kost->foto_bangunan_tampak_depan = $request->session()->get('foto_lainnya');
        $kost->foto_tampilan_dalam = $request->session()->get('foto_kamar_mandi');

         $kost->peraturan_kost = json_encode($request->peraturan_kost);
        $kost->dibangun_tahun = $request->dibangun_tahun;
        $kost->alamat_kost = $request->alamat_kost;

        '',
        '',
        '',
        '',
        '',
        'fasilitas_umum',
        'fasilitas_kamar',
        'fasilitas_kamar_mandi',
        'parkir',
        'ukuran_kamar',
        'jumlah_total_kamar',
        'jumlah_kamar_tersedia',
        'harga_sewa_per_bulan',
        'harga_sewa_per_minggu',
        'harga_sewa_per_hari'

        $kost->save();

        // Clear session data after saving
        $request->session()->forget(['nama_kost', 'jenis_kost']);
        return redirect()->route('owner');
    }
        
}
