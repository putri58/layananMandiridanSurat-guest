<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkasPersyaratanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/berkas-persyaratan', [BerkasPersyaratanController::class, 'index'])
    ->name('guest.berkas-persyaratan');

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/auth', [AuthController::class, 'index']);

// Route::get('/dashboard', [DashboardController::class, 'index'])
// ->name('dashboard')
// ->Middleware('checkislogin');

Route::group(['middleware' => ['checkislogin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});

Route::resource('/warga', WargaController::class);
Route::resource('jenis-surat', JenisSuratController::class);
Route::resource('/user', UserController::class);
Route::resource('/about', AboutController::class);
Route::resource('/permohonan', PermohonanSuratController::class);
Route::delete('/permohonan/media/{id}', [PermohonanSuratController::class, 'deleteMedia'])
                ->name('permohonan.deleteMedia');


Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');

Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['checkrole:Pelanggan']], function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
});
Route::get('/user/{id}', [UserController::class, 'show'])->name('profile.show');