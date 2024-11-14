<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        return view('index', compact('kosts'));
    }
    public function detail($id)
    {
        $kost = Kost::findOrFail($id);
        return view('detail', compact('kost'));
    }

    public function search(Request $request){
        
    }
}
