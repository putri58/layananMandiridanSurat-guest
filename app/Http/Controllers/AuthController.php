<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login'); // login.blade.php di folder resources/views
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi sederhana sesuai aturan
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // harus ada huruf kapital
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.',
        ]);

        // Cek apakah username dan password benar (contoh statis)
        if ($request->username === 'Putri' && $request->password === 'Agustin58') {
            return view('/pesanLogin')->with('success', 'Login berhasil! Selamat datang di dashboard.');
        } else {
            return back()->with('error', 'Username atau password salah. Silakan coba lagi.');
        }
    }
}
