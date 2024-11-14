<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'kost_id'
    ];

    public function kosts(){
        return $this->belongsTo(Kost::class);
    }
}
