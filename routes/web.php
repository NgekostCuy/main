<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'home'])->name('home');

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

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[AdminController::class, 'index']);
    Route::get('/dashboard/admin',[AdminController::class, 'admin'])->middleware('UserAkses:admin');
    Route::get('/dashboard/owner',[AdminController::class, 'owner'])->middleware('UserAkses:owner');
    Route::get('/dashboard/user',[AdminController::class, 'user'])->middleware('UserAkses:user');

    // redirect ke halaman home
    Route::get('/home', [LoginController::class, 'home'])->name('home');
    Route::get('/logout',[LoginController::class, 'logout']);        
    Route::get('/detail', [LoginController::class, 'detail'])->name('detail');
    Route::get('/favorite', [LoginController::class, 'favorite'])->name('favorite');
});

