<!DOCTYPE html>
<html lang="id">
@extends('layouts.guest.app')
@section('content')
<body>

    <section class="banner-section">
        <div class="container">
            <h2>Form Permohonan Surat</h2>
            <p class="mb-0" style="font-size: 0.95rem; opacity: 0.9;">Silakan isi formulir permohonan surat dengan benar dan lengkap.</p>
        </div>
    </section>

    <div class="container" style="max-width: 900px;">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    {{-- Container utama form --}}
    <div class="form-card">
        <div class="form-header">
            Form Pengajuan Permohonan Surat
        </div>
        <div class="form-body">

            {{-- Form Action mengarah ke route permohonan.store (POST /permohonan) --}}
            <form action="{{ route('permohonan.store') }}" method="POST">

                @csrf

                <div class="row">

                    <!-- Nomor Permohonan (Readonly/Generated) -->
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="nomor_permohonan">Nomor Permohonan</label>
                        <input type="text"
                            class="form-control"
                            id="nomor_permohonan"
                            name="nomor_permohonan"
                            value="PS/{{ date('Y') }}/AUTO"
                            readonly
                            placeholder="Akan digenerate otomatis">
                        <small class="form-text text-muted">Nomor akan digenerate setelah disimpan.</small>
                    </div>

                    <!-- ID Pemohon (Hidden, diisi otomatis dari user yang login) -->
                    
                    $request->merge(['pemohon_warga_id' => auth()->id()]);


                    <!-- Jenis ID (Dropdown Select) -->
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="jenis_id">Jenis Surat<span style="color:#ff4c4c;">*</span></label>
                        <div class="col-lg-4 col-md-6 mb-3">
    <select class="form-select @error('jenis_id') is-invalid @enderror" 
            id="jenis_id" 
            name="jenis_id" 
            required>
        <option value="">-- Pilih Jenis Surat --</option>

        @foreach ($jenis_surat as $jenis)
            <option value="{{ $jenis->jenis_id }}" 
                {{ old('jenis_id') == $jenis->jenis_id ? 'selected' : '' }}>
                 {{ $jenis->nama_jenis }}
             </option>
        @endforeach


    </select>
    @error('jenis_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

                         @error('jenis_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Tanggal Pengajuan (Date Input) -->
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label for="tanggal_pengajuan">Tanggal Pengajuan <span style="color:#ff4c4c;">*</span></label>
                        <input type="date"
                            class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                            id="tanggal_pengajuan"
                            name="tanggal_pengajuan"
                            value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                            required>
                        @error('tanggal_pengajuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Catatan / Keterangan Detail (Textarea Full Width) -->
                    <div class="col-12 mb-3">
                        <label for="catatan">Catatan / Keterangan Detail Permohonan</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror"
                                id="catatan"
                                name="catatan"
                                rows="4"
                                placeholder="Jelaskan detail tujuan permohonan surat ini.">{{ old('catatan') }}</textarea>
                        @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Status (Otomatis "Menunggu" / 'Pending', tidak perlu diinput) -->

                </div> {{-- End Row --}}

                {{-- Tombol Aksi --}}
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn-custom-base btn-submit-custom me-2">
                        ✉️ AJUKAN PERMOHONAN
                    </button>
                    {{-- Mengarah ke daftar permohonan --}}
                    <a href="{{ route('permohonan.index') }}" class="btn-custom-base btn-back-custom">
                        ⬅️ KEMBALI
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection
</html>
