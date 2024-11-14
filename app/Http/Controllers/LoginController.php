<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Kost;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    function index() {
        return view('auth.login');
    }
    function home() {
        $kosts = Kost::all();
        return view('index', compact('kosts'));
    }

    public function favorite()
    {
        return view('detail'); // Ganti dengan nama view yang sesuai
    }

    function login(Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib',
            'password.required'=>'password Wajib',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard/admin')-> with('success', 'Halo Admin');;
            }else if(Auth::user()->role == 'user'){
                return redirect('home');
            }else if(Auth::user()->role == 'owner'){
                return redirect('/dashboard/owner')-> with('success', 'Halo Owner');
            }
        }else{
            return redirect('/login')->withErrors('Login Gagal, Harap periksa kembali email dan password anda')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect('/login');
    }

    function forgot_password() {
        return view('auth.forgot_password');
    }

    function forgot_password_act(Request $request) {
        $custom_message = [
            'email.required' => 'email tidak boleh kosong',
            'email.format' => 'format email tidak valid',
            'email.exist' => 'email tidak terdaftar',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],$custom_message);

        $token = \Str::random(40);

        PasswordResetToken::updateOrcreate(
            [
                'email' => $request->email,
            ],
            [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('login')->with('success', 'Harap Periksa Email Anda untuk membuat kata sandi baru');
    }

    function validation_forgot_password(Request $request, $token) {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('/')->with('success','invalid token');
        }
        return view('auth.validasi-token', compact('token'));
    }

    function validation_forgot_password_act(Request $request) {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 6 karakter',
        ];
    
        $request->validate([
            'password' => 'required|min:6'
        ], $customMessage);
    
        $token = PasswordResetToken::where('token', $request->token)->first();
    
        if (!$token) {
            return redirect()->route('forgot-password')->with('error', 'Token tidak sesuai atau telah berubah');
        }
    
        $user = User::where('email', $token->email)->first();
    
        if (!$user) {
            return redirect()->route('forgot-password')->with('error', 'Email tidak terdaftar di database');
        }
    
        $user->update([
            'password' => Hash::make($request->password)
        ]);
    
        $token->delete();
    
        return redirect()->route('home')->with('success', 'Password telah diubah');
    }

}
