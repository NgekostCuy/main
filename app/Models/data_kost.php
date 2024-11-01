<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PeraturanKost;

class data_kost extends Model
{
    protected $table = 'data_kost';

    protected $fillable = [
        'nama_kost', 
        'jenis_kost', 
        'deskripsi_kost',
        'peraturan_kost', 
        'dibangun_tahun',
        'nama_pengelola',
        'nomor_hp_pemilik', 
        'alamat_kost',
        'foto_bangunan_tampak_depan',
        'foto_tampilan_dalam',
        'foto_tampak_jalan',
        'foto_depan_kamar',
        'foto_dalam_kamar',
        'foto_kamar_mandi',
        'foto_lainnya',
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
    ];

    public function peraturanKost()
    {
        return $this->belongsToMany(PeraturanKost::class, 'data_kost_peraturan_kost');
    }
}
