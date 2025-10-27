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

    /* === Card container (Menggantikan .form-card) === */
    .form-card {
        background: #fff;
        border-radius: 18px;
        padding: 0; /* Padding dipindahkan ke form-body */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        margin: 60px auto 100px auto; /* Margin untuk memposisikan di tengah */
        max-width: 600px; /* Batasi lebar container */
        overflow: hidden; /* Memastikan header yang bulat terlihat baik */
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

    .form-control,
    .form-label,
    .form-select {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Interaktif: Menggunakan warna Navy saat focus */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 0.25rem rgba(0, 31, 63, 0.2);
        background-color: var(--light-gray);
    }

    /* === Tombol Kustom === */
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

    /* Kelas dasar untuk semua tombol kustom */
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
</style>

<body>

<section class="banner-section">
        <div class="container">
            <h2>Form Input Jenis Surat</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi data warga dengan benar dan lengkap untuk proses layanan mandiri.</p>
        </div>
    </section>

            @if (session('info'))
                <div class="alert alert-info">
                    {!! session('info') !!}
                </div>
            @endif

    <div class="form-card">
        <div class="form-header">
            Form Tambah Jenis Surat
        </div>

        <div class="form-body">
            <form action="{{ route('jenis-surat.store') }}" method="POST" id="jenisSuratForm">
                @csrf

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Surat</label>
                    <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan kode surat" required>
                </div>

                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Nama Jenis Surat</label>
                    <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" placeholder="Masukkan nama jenis surat" required>
                </div>

                <div class="mb-3">
                    <label for="syarat_json" class="form-label">Syarat Surat (Pisahkan dengan koma)</label>
                    <textarea name="syarat_json" id="syarat_json" rows="3" class="form-control" placeholder="Contoh: KTP, KK, Surat Pengantar RT/RW" required></textarea>
                </div>

                <div class="text-center mt-4">
                    {{-- Mengganti kelas Bootstrap standar dengan kelas kustom --}}
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        💾 SIMPAN DATA
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn-custom-base btn-back-custom">
                        ⬅️ KEMBALI
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Anda harus memastikan skrip Bootstrap dimuat di layout utama (@extends('layouts.guest.app')) --}}
    {{-- Jika tidak, letakkan skrip di sini (diasumsikan sudah dimuat di layout utama) --}}
    {{-- <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script> --}}

    <script>
        document.getElementById('jenisSuratForm').addEventListener('submit', function(e) {
            const kode = document.getElementById('kode').value.trim();
            const nama = document.getElementById('nama_jenis').value.trim();
            const syarat = document.getElementById('syarat_json').value.trim();

            if (!kode || !nama || !syarat) {
                e.preventDefault();
                alert('⚠️ Harap isi semua kolom sebelum menyimpan!');
            }
        });
    </script>

@endsection
</body>
</html>
