<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kost extends Model
{
    use HasFactory;

    protected $table = 'kost';
    protected $fillable = ['nama', 'deskripsi', 'peraturan', 'nama_pemilik', 'nomor_hp', 'harga', 'jumlah_kamar'];

}
