<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Edit User</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">
                Silakan perbarui data user dengan benar dan lengkap.
            </p>
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
            Edit Data Pengguna (User)
        </div>

        <div class="form-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

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

                    {{-- Email --}}
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

                    {{-- Password Baru (opsional) --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="password">Password Baru</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Isi jika ingin mengubah password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password Baru --}}
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi Password Baru">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="mb-3 w-100">
    <select class="form-select" id="role" name="role" required style="border: 1px solid #ccc; padding: 0.5rem 1rem;">
        <option value="" disabled selected>— Pilih Role —</option>
        <option value="Pelanggan">Pelanggan</option>
        <option value="Mitra">Mitra</option>
    </select>
</div>
                </div> {{-- End Row --}}

                {{-- Tombol Aksi --}}
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        🔄 UPDATE USER
                    </button>

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
