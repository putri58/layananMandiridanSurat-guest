<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

<body>
    <section class="banner-section">
        <div class="container">
            <h2>Edit Data Warga</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan perbarui data warga dengan benar dan lengkap.</p>
        </div>
    </section>

    @if (session('info'))
        <div class="alert alert-info">
            {!! session('info') !!}
        </div>
    @endif

    <div class="container">
        <div class="form-container">

            <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST" id="formWarga">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                            value="{{ old('no_ktp', $warga->no_ktp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama', $warga->nama) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Male" {{ $warga->gender == 'Male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Female" {{ $warga->gender == 'Female' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Other" {{ $warga->gender == 'Other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            value="{{ old('agama', $warga->agama) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $warga->phone) }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $warga->email) }}" required>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn-primary-custom me-3">
                        💾 UPDATE DATA
                    </button>
                    <a href="{{ route('warga.index') }}" class="btn-secondary-custom">
                        ⬅ KEMBALI
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
</body>
</html>
