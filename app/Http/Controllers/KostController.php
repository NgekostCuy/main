<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        // Menampilkan data yang diambil dari database untuk pengecekan
        return view('index', compact('kosts'));
    }
}
