<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\BerkasPersyaratanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berkas-persyaratan', [BerkasPersyaratanController::class, 'index'])
    ->name('guest.berkas-persyaratan');

Route::get('/auth', [AuthController::class, 'index']);       // tampilkan form
Route::post('/auth/login', [AuthController::class, 'login']); // proses login

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/warga', WargaController::class);
Route::resource('jenis-surat', JenisSuratController::class);


