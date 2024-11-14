<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
class Kost extends Model
{
    use HasFactory;
    protected $table = 'kosts';

    protected $fillable = [
        'nama_kost',
        'deskripsi_kost',
        'peraturan_kost',
        'fasilitas_kost',
        'nama_pemilik',
        'no_telepon',
        'harga',
        'jumlah_kamar',
        'cover',
        'latitude',
        'longitude'
    ];

    public function images()
    {
        return $this->hasMany(Images::class, 'kost_id');
    }
}
