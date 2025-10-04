<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkasPersyaratanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berkas-persyaratan', [BerkasPersyaratanController::class, 'index'])
    ->name('guest.berkas-persyaratan');

Route::get('/auth', [AuthController::class, 'index']);       // tampilkan form
Route::post('/auth/login', [AuthController::class, 'login']); // proses login