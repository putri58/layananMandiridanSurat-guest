<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Input Data Warga</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi data warga dengan benar dan lengkap untuk proses layanan mandiri.</p>
        </div>
    </section>


            @if (session('info'))
                <div class="alert alert-info">
                    {!! session('info') !!}
                </div>
            @endif

    <div class="container">
        <div class="form-container">

            <form action="{{ route('warga.store') }}" method="POST" id="formWarga">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan Nomor KTP" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Male">Laki-laki</option>
                            <option value="Female">Perempuan</option>
                            <option value="Other">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan Agama" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor HP">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn-primary-custom me-3">
                        💾 SIMPAN DATA
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn-secondary-custom">
                        ⬅ KEMBALI
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
</body>
</html>
