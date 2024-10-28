<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'kost_id',
        'file_name',
        'file_path',
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}