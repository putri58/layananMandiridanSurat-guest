<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

<style>
    /* === Warna utama === */
    :root {
        --navy: #ffffffff; /* Biru tua */
        --red: #b30000;
        --light-gray: #f5f6fa;
        --accent-navy: #003366; /* Navy yang sedikit lebih terang untuk hover */
    }

    /* UBAH: Gunakan warna navy untuk latar belakang utama */
    body {
        background-color: var(--navy); /* Menggunakan warna navy (biru tua) */
    }

    /* === Banner utama === */
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
    .banner-section p {
        font-size: 1rem !important;
        font-weight: 300;
        opacity: 0.95;
    }

    /* === Card container === */
    .form-container {
        background: #fff;
        border-radius: 18px; /* Lebih bulat */
        padding: 40px; /* Padding lebih besar */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih menonjol */
        margin-top: -60px; /* Diangkat lebih tinggi ke banner */
        margin-bottom: 70px;
        animation: fadeInUp 0.8s ease;
        max-width: 850px; /* Lebar sedikit lebih besar */
        margin-left: auto;
        margin-right: auto;
        border: 3px solid var(--navy); /* Tambahkan outline navy */
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* === Label & Input === */
    label {
        font-weight: 700; /* Label lebih tebal */
        color: var(--accent-navy); /* Warna label menjadi navy yang sedikit lebih terang */
        margin-bottom: 8px;
        display: block;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 12px 15px; /* Padding lebih besar */
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Sedikit bayangan pada input */
    }

    /* Interaktif: Menggunakan warna Navy saat focus */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--navy); /* Border saat fokus menjadi Navy */
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25); /* Glow shadow Navy */
        background-color: var(--light-gray);
    }

    /* === Tombol === */
    .btn-primary-custom,
    .btn-secondary-custom {
        border: none;
        border-radius: 10px;
        font-weight: 600; /* Lebih tebal */
        padding: 12px 30px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex; /* Agar ikon dan teks sejajar */
        align-items: center;
        justify-content: center;
        gap: 8px; /* Jarak antara ikon dan teks */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-transform: uppercase; /* Teks tombol menjadi huruf kapital */
    }

    .btn-primary-custom {
        background: var(--red);
        color: #fff;
    }

    /* Interaktif: Hover Primary Button */
    .btn-primary-custom:hover {
        background: #d90404;
        transform: translateY(-2px); /* Efek sedikit terangkat */
        box-shadow: 0 6px 12px rgba(179, 0, 0, 0.4);
    }

    .btn-secondary-custom {
        background: var(--navy); /* Biru tua Navy */
        color: #fff;
    }

    /* Interaktif: Hover Secondary Button */
    .btn-secondary-custom:hover {
        background: var(--accent-navy); /* Navy yang sedikit lebih terang */
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 31, 63, 0.4);
    }
</style>

<body>
    <section class="banner-section">
        <div class="container">
            <h2>Form Input Data Warga</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi data warga dengan benar dan lengkap untuk proses layanan mandiri.</p>
        </div>
    </section>

    <div class="container">
        <div class="form-container">

            @if (session('info'))
                <div class="alert alert-info">
                    {!! session('info') !!}
                </div>
            @endif

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