<!DOCTYPE html>
<html lang="id">
<head>
    @extends('layouts.guest.app')
</head>
@section('content')
<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Edit User</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan perbarui data pengguna dengan benar dan lengkap.</p>
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
            Form Edit Pengguna (User)
        </div>
        <div class="form-body">
            {{-- Form untuk update --}}
            <form action="{{ route('user.edit', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Profile Picture --}}
                    <div class="col-12 mb-4">
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Foto Profil</label>
                            @if($user->profile_picture)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($user->profile_picture) }}" 
                                         alt="Foto Profil" 
                                         width="100" 
                                         class="rounded-circle border">
                                    <p class="small text-muted mt-1">Foto saat ini</p>
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('profile_picture') is-invalid @enderror" 
                                   id="profile_picture" 
                                   name="profile_picture">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
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
                            value="{{ old('name', $user->name) }}"
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
                            value="{{ old('email', $user->email) }}"
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
                            <option value="" disabled>— Pilih Role —</option>
                            <option value="Pelanggan" {{ old('role', $user->role) == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                            <option value="Mitra" {{ old('role', $user->role) == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password (opsional) --}}
                    <div class="col-lg-6 col-md-6 mb-3">
                        <label for="password">Password Baru (opsional)</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Kosongkan jika tidak ingin mengubah password">
                        <small class="text-muted">Minimal 8 karakter</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-lg-6 col-md-6 mb-3">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password baru">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div> {{-- End Row --}}

                {{-- Tombol Aksi --}}
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        💾 UPDATE USER
                    </button>
                    {{-- Tombol Batal dan Kembali --}}
                    <a href="{{ route('user.show', $user->id) }}" class="btn-custom-base btn-back-custom me-2">
                        🔍 DETAIL
                    </a>
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