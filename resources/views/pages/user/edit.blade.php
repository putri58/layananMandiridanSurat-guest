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
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Password Baru (opsional) --}}
                    <div class="col-lg-6 col-md-6 mb-3">
                        <label for="password">Password Baru (opsional)</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Isi jika ingin mengubah password">
                        <small class="text-muted">Minimal 8 karakter</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password Baru --}}
                    <div class="col-lg-6 col-md-6 mb-3">
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

                    {{-- Profile Picture --}}
                    <div class="col-12 mb-4">
                        <div class="card p-3">
                            <label class="form-label">Foto Profil</label>
                            
                            {{-- Tampilkan foto saat ini jika ada --}}
                            @if($user->profile_picture && Storage::exists($user->profile_picture))
                                <div class="mb-3">
                                    <img src="{{ Storage::url($user->profile_picture) }}" 
                                         alt="Foto Profil Saat Ini" 
                                         width="120" 
                                         height="120"
                                         class="rounded-circle border object-fit-cover">
                                    <p class="small text-muted mt-2">Foto saat ini</p>
                                </div>
                            @else
                                <div class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-user-circle fa-3x text-muted me-3"></i>
                                        <div>
                                            <p class="mb-0 text-muted">Belum ada foto profil</p>
                                            <small class="text-muted">Upload foto baru di bawah</small>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Input file untuk foto baru --}}
                            <input type="file" 
                                   name="profile_picture" 
                                   class="form-control @error('profile_picture') is-invalid @enderror"
                                   accept="image/*">
                            
                            <div class="form-text text-muted mt-2">
                                <i class="fa fa-info-circle me-1"></i> Biarkan kosong jika tidak ingin mengubah foto profil.
                            </div>
                            
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Files tambahan --}}
                    <div class="col-12 mb-4">
                        <div class="card p-3">
                            <label class="form-label">File Tambahan (Opsional)</label>
                            
                            {{-- Tampilkan file yang sudah ada jika ada --}}
                            @if($user->files && count($user->files) > 0)
                                <div class="mb-3">
                                    <p class="mb-2"><strong>File saat ini:</strong></p>
                                    <ul class="list-group">
                                        @foreach($user->files as $index => $file)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <i class="fa fa-file me-2"></i>
                                                    {{ basename($file) }}
                                                </span>
                                                <a href="{{ Storage::url($file) }}" 
                                                   target="_blank" 
                                                   class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i> Lihat
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Input untuk file baru --}}
                            <input type="file" 
                                   name="files[]" 
                                   class="form-control @error('files') is-invalid @enderror" 
                                   multiple>
                            
                            <div class="form-text text-muted mt-2">
                                <i class="fa fa-info-circle me-1"></i> 
                                Dapat memilih lebih dari satu file. Biarkan kosong jika tidak ingin menambah file.
                            </div>
                            
                            @error('files')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('files.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div> {{-- End Row --}}

                {{-- Tombol Aksi --}}
                <div class="col-12 mt-4 d-flex justify-content-end gap-2">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        <i class="fa fa-save me-1"></i> UPDATE USER
                    </button>

                    <a href="{{ route('user.show', $user->id) }}" class="btn-custom-base btn-info-custom me-2">
                        <i class="fa fa-eye me-1"></i> LIHAT DETAIL
                    </a>

                    <a href="{{ route('user.index') }}" class="btn-custom-base btn-back-custom">
                        <i class="fa fa-arrow-left me-1"></i> KEMBALI
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
</body>
</html>