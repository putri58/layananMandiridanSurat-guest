<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')
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
