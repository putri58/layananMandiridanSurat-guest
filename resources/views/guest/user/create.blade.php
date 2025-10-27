<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

<style>
.banner-section {
        background: linear-gradient(90deg, var(--navy), var(--red));
        color: #ffffffff;
        padding: 30px 0;
        text-align: center;
        font-weight: 700; /* Dibuat lebih tebal */
        font-size: 1.8rem; /* Dibuat lebih besar */
        letter-spacing: 0.8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4); /* Bayangan lebih dramatis */
    }

    /* === Warna utama === */
    :root {
        --navy: #ffffffff; /* Biru tua */
        --red: #b30000;
        --light-gray: #f5f6fa;
        --accent-navy: #003366; /* Navy yang sedikit lebih terang untuk hover */
    }

    /* Latar belakang halaman utama */
    body {
        background-color: var(--navy);
    }

    /* === Card container === */
    .form-card {
        background: #fff;
        border-radius: 18px;
        padding: 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        margin: 60px auto 100px auto;
        max-width: 800px; /* Diperbesar sedikit agar 3 kolom muat */
        overflow: hidden;
        border: 2px solid var(--navy);
    }

    /* === Form Header === */
    .form-header {
        background: linear-gradient(135deg, var(--navy), var(--accent-navy));
        color: #fff;
        padding: 20px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* === Form Body === */
    .form-body {
        padding: 30px;
    }

    /* === Label & Input === */
    label {
        font-weight: 700;
        color: var(--accent-navy);
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Interaktif: Menggunakan warna Navy saat focus */
    .form-control:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 0.25rem rgba(0, 31, 63, 0.2);
        background-color: var(--light-gray);
    }

    /* === Tombol Kustom === */
    .btn-custom-base {
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
    }

    /* Tombol Simpan (Merah) */
    .btn-submit-custom {
        background: var(--red);
        color: #fff;
    }
    .btn-submit-custom:hover {
        background: #d90404;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(179, 0, 0, 0.4);
    }

    /* Tombol Kembali (Navy) */
   .btn-back-custom {
        background: var(--navy);
        color: #5d79c5ff;
    }
    .btn-back-custom:hover {
        background: var(--accent-navy);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 31, 63, 0.4);
    }
</style>

<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Tambah User</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi data warga dengan benar dan lengkap untuk proses layanan mandiri.</p>
        </div>
    </section>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    {{-- Container utama form --}}
    <div class="form-card">
        <div class="form-header">
            Form Tambah Pengguna (User)
        </div>
        <div class="form-body">
            {{-- Sesuaikan action route Anda --}}
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Nama Lengkap (Diambil dari input Anda) --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nama Lengkap"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email address (Diambil dari input Anda) --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email" {{-- Tipe diubah ke 'email' --}}
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password (Diambil dari input Anda, perbaikan @error ke 'password') --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Password"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password (Diambil dari input Anda) --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi Password"
                            required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> {{-- End Row --}}

                {{-- Tombol Aksi (Diperbaiki dengan kelas kustom) --}}
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        💾 SIMPAN USER
                    </button>
                    {{-- Ganti tombol Batal menjadi link Kembali --}}
                    <a href="{{ route('dashboard') }}" class="btn-custom-base btn-back-custom">
                        ⬅️ KEMBALI
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
</body>
</html>
