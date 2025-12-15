<!DOCTYPE html>
<html lang="id">
<head>
    @extends('layouts.guest.app')
</head>
@section('content')
<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Tambah User Baru</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi data pengguna baru dengan benar dan lengkap.</p>
        </div>
    </section>
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="form-card">
        <div class="form-header">
            Form Tambah Pengguna Baru
        </div>
        <div class="form-body">
            {{-- Form untuk CREATE --}}
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- HAPUS @method('PUT') karena CREATE pakai POST --}}

                <div class="row">
                    {{-- Profile Picture --}}
                    <div class="col-12 mb-4">
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Foto Profil</label>
                            <input type="file" 
                                   class="form-control @error('profile_picture') is-invalid @enderror" 
                                   id="profile_picture" 
                                   name="profile_picture">
                            <small class="text-muted">Upload foto profil (opsional)</small>
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Nama Lengkap --}}
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

                    {{-- Email address --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email"
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

                    {{-- Role --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" 
                                id="role" 
                                name="role" 
                                required>
                            <option value="" disabled selected>— Pilih Role —</option>
                            <option value="Pelanggan" {{ old('role') == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                            <option value="Mitra" {{ old('role') == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password (WAJIB untuk create) --}}
                    <div class="col-lg-6 col-md-6 mb-3">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Password"
                            required>
                        <small class="text-muted">Minimal 8 karakter</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-lg-6 col-md-6 mb-3">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div> {{-- End Row --}}

                {{-- Tombol Aksi --}}
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        ➕ TAMBAH USER
                    </button>
                    <a href="{{ route('user.index') }}" class="btn-custom-base btn-back-custom">
                        ⬅️ KEMBALI KE DAFTAR
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
</body>
</html>