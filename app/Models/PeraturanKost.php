<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\data_kost;

class PeraturanKost extends Model
{
    use HasFactory;

    protected $fillable = ['nama_peraturan'];

    // Relasi many-to-many dengan DataKost
    public function dataKost()
    {
        return $this->belongsToMany(data_kost::class, 'data_kost_peraturan_kost');
    }
}
