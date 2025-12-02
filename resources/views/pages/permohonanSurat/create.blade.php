@extends('layouts.guest.app')

@section('content')
<section class="pt-5 pb-5 bg-light">
    <div class="container">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Buat Permohonan Baru</h3>
                <p class="text-muted mb-0">Silakan isi formulir di bawah dengan lengkap.</p>
            </div>
            <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="fa fa-file-text-o me-2"></i> Formulir Pengajuan</h5>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">

                        {{-- KOLOM KIRI (DATA UTAMA) --}}
                        <div class="col-lg-6">
                            <h6 class="fw-bold text-secondary border-bottom pb-2 mb-3">Informasi Surat</h6>

                            {{-- Nomor Surat --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor Permohonan</label>
                                <input type="text" class="form-control bg-light"
                                       value="PS/{{ date('Y') }}/AUTO" readonly
                                       placeholder="Nomor akan digenerate otomatis">
                                <small class="text-muted fst-italic">Nomor surat akan dibuat otomatis oleh sistem.</small>
                            </div>

                            {{-- Pemohon --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pemohon <span class="text-danger">*</span></label>
                                <select name="pemohon_warga_id" class="form-select @error('pemohon_warga_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach ($warga as $w)
                                        <option value="{{ $w->warga_id }}" {{ old('pemohon_warga_id') == $w->warga_id ? 'selected' : '' }}>
                                            {{ $w->nama }} - {{ $w->no_ktp }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pemohon_warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Jenis Surat --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Surat <span class="text-danger">*</span></label>
                                <select name="jenis_id" class="form-select @error('jenis_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    @foreach ($jenis_surat as $jenis)
                                        <option value="{{ $jenis->jenis_id }}" {{ old('jenis_id') == $jenis->jenis_id ? 'selected' : '' }}>
                                            {{ $jenis->nama_jenis }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Tanggal --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Pengajuan <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_pengajuan"
                                       class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                                       value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}" required>
                                @error('tanggal_pengajuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- KOLOM KANAN (DETAIL & UPLOAD) --}}
                        <div class="col-lg-6">
                            <h6 class="fw-bold text-secondary border-bottom pb-2 mb-3">Detail & Lampiran</h6>

                            {{-- Catatan --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Catatan / Keterangan</label>
                                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                                          rows="4" placeholder="Jelaskan detail tujuan permohonan surat ini.">{{ old('catatan') }}</textarea>
                                @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Upload File --}}
                            <div class="mb-3">
                                <div class="p-3 bg-light border rounded">
                                    <label class="form-label fw-bold text-success mb-2">
                                        <i class="fa fa-cloud-upload me-1"></i> Upload Lampiran (KTP/KK)
                                    </label>
                                    <input type="file" name="files[]" class="form-control" multiple>
                                    <div class="form-text text-muted mt-2 small">
                                        <i class="fa fa-info-circle me-1"></i>
                                        Bisa pilih banyak file sekaligus. Format: JPG, PNG, PDF. Maks 10MB/file.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> {{-- End Row --}}

                    <hr class="my-4">

                    {{-- TOMBOL AKSI --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('permohonan.index') }}" class="btn btn-secondary px-4">
                            <i class="fa fa-times me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4 btn-lg">
                            <i class="fa fa-paper-plane me-1"></i> Ajukan Permohonan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>
@endsection
