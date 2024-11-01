<?php

namespace App\Http\Controllers;

use App\Models\data_kost;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        echo 'Welcome';
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
    
    function admin() {
        echo 'Welcome admin';
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<h1>admin</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
    
    function user() {
        echo 'Welcome user';
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<h1>user</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
    function owner() {
        // echo 'Welcome owner';
        // echo "<h1>".Auth::user()->name."</h1>";
        // echo "<h1>owner</h1>";
        // echo "<a href='/logout'>Logout</a>";
        
        // $kost = data_kost::get();
        // dd($kost);
          return view('dashboard.owner');
    }

}
