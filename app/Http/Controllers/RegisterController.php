<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index() {
        return view('auth.register');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required | min:7 | max:20',
            'email' => 'required | email:dns | unique:users',
            'password'=> 'required | min:3',
            'role' => 'required|in:user,owner,admin',
        ]);

        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];

        User::create($inforegister);

        $request->session()->flash('success', 'Account Created Succesfully');

        return redirect('/');
    }
}
