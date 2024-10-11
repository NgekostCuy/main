<?php

namespace App\Http\Controllers;

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
        echo "<a href='/logout'>Logout</a>";
    }
    
    function user() {
        echo 'Welcome user';
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
    function owner() {
        echo 'Welcome owner';
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

}
