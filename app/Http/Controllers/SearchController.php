<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Cari data kost berdasarkan kata kunci
        $kosts = Kost::where('nama_kost', 'like', '%' . $query . '%')->get();

        return view('search', compact('query', 'kosts'));
    }
}
