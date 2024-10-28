<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $table = 'kost';
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'peraturan',
        'nama_pemilik',
        'nomor_hp',
        'harga',
        'jumlah_kamar',
        'main_image',
    ];

    public function images()
    {
        return $this->hasMany(KostImage::class);
    }
}
