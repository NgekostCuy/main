<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'home'])->name('home');

    Route::get('/detail', [LoginController::class, 'detail'])->name('detail');

    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
    Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

    Route::get('/validation-forgot-password/{token}', [LoginController::class, 'validation_forgot_password'])->name('validation-forgot-password');
    Route::post('/validation-forgot-password-act', [LoginController::class, 'validation_forgot_password_act'])->name('validation-forgot-password-act');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/home', function ()  {
    return redirect('dashboard');
});

Route::get('/favorit', function ()  {
    return view('favorite');
});

Route::get('/', [KostController::class, 'index']);

Route::get('/detail', [LoginController::class, 'detail'])->name('detail');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[AdminController::class, 'index']);
    Route::get('/dashboard/admin',[AdminController::class, 'admin'])->middleware('UserAkses:admin');
    // Route::get('/create', [AdminController::class, 'show'])
    Route::get('/dashboard/owner', [AdminController::class, 'owner'])->name('dashboard.owner')->middleware('UserAkses:owner');

    Route::get('/dashboard/user',[AdminController::class, 'user'])->middleware('UserAkses:user');

    Route::get('/add_kost',[AdminController::class, 'add_kost'])->middleware('UserAkses:owner');
    Route::post('/submit', [AdminController::class, 'submit_kost'])->middleware('UserAkses:owner');
    Route::delete('/kost/{id}', [AdminController::class, 'destroy'])->name('kost.destroy');

    // Rute untuk menampilkan form edit
    Route::get('/edit_kost/{id}', [AdminController::class, 'edit'])->name('kost.edit');

    // Rute untuk menyimpan data kost setelah di-edit
    Route::post('/kost/{id}', [AdminController::class, 'update'])->name('kost.update')->middleware('auth');

    // Rute untuk menghapus kost
    Route::delete('/kost/{id}', [AdminController::class, 'destroy'])->name('kost.destroy');

    // redirect ke halaman home
    Route::get('/home', [LoginController::class, 'home'])->name('home');
    Route::get('/logout',[LoginController::class, 'logout']);        
    Route::get('/detail', [LoginController::class, 'detail'])->name('detail');
    Route::get('/favorite', [LoginController::class, 'favorite'])->name('favorite');
});

