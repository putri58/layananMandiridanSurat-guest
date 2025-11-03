<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')

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
