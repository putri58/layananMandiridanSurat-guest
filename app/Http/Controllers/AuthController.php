<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Menampilkan view form login.
     */
    public function showLoginForm()
    {
        // Asumsi: View login berada di resource/views/login.blade.php
        return view('pages.auth.login');
    }

    /**
     * Method index() untuk menangani route /auth (jika route resource salah).
     * Mengarahkan ke form login menggunakan nama route 'login'.
     */
    public function index()
    {
        return redirect()->route('login');
    }

    /**
     * Memproses data login (email dan password).
     */
    public function login(Request $request)
    {
        // 1. Validasi data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Autentikasi
        if (Auth::attempt($credentials)) {

            // Login berhasil
            $request->session()->regenerate();
            // Arahkan ke tujuan awal atau ke /dashboard
            return redirect()->intended('/dashboard');

        }

        // 3. Login Gagal
        return back()->withInput(['email'])->withErrors([
        'email' => 'Email atau Password yang Anda masukkan tidak valid.',
    ])->with('error', 'Login Gagal. Silakan coba lagi.');
    }

    /**
     * Mengeluarkan pengguna (logout).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect ke URL /login
        return redirect('/login');
    }
}
