<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\BerkasPersyaratanController;

Route::get('/', function () {
    return view('guest.dashboard');
});

Route::get('/berkas-persyaratan', [BerkasPersyaratanController::class, 'index'])
    ->name('guest.berkas-persyaratan');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth', [AuthController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/warga', WargaController::class);
Route::resource('jenis-surat', JenisSuratController::class);
Route::resource('/user',UserController::class);

