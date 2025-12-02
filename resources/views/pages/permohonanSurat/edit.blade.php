@extends('layouts.guest.app')

@section('content')
<section class="pt-5 pb-5 bg-light">
    <div class="container">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit Permohonan</h3>
                <p class="text-muted mb-0">Ubah data atau kelola lampiran surat.</p>
            </div>
            <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="row g-4">

            {{-- KOLOM KIRI: FORM EDIT DATA --}}
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-primary"><i class="fa fa-pencil-square-o me-2"></i> Form Perubahan Data</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('permohonan.update', $permohonan->permohonan_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Nomor Surat (Readonly) --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor Permohonan</label>
                                <input type="text" name="nomor_permohonan" class="form-control bg-light"
                                       value="{{ old('nomor_permohonan', $permohonan->nomor_permohonan) }}" readonly>
                            </div>

                            {{-- Pemohon (Warga) --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pemohon</label>
                                <select name="pemohon_warga_id" class="form-select @error('pemohon_warga_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach($warga as $w)
                                        <option value="{{ $w->warga_id }}"
                                            {{ old('pemohon_warga_id', $permohonan->pemohon_warga_id) == $w->warga_id ? 'selected' : '' }}>
                                            {{ $w->nama }} - {{ $w->no_ktp }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pemohon_warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Jenis Surat --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Surat</label>
                                <select name="jenis_id" class="form-select @error('jenis_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    @foreach($jenis_surat as $j)
                                        <option value="{{ $j->jenis_id }}"
                                            {{ old('jenis_id', $permohonan->jenis_id) == $j->jenis_id ? 'selected' : '' }}>
                                            {{ $j->nama_jenis }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Catatan</label>
                                <textarea name="catatan" class="form-control" rows="3">{{ old('catatan', $permohonan->catatan) }}</textarea>
                            </div>

                            <hr class="my-4">

                            {{-- UPLOAD FILE BARU --}}
                            <div class="mb-4 p-3 bg-light border rounded">
                                <label class="form-label fw-bold text-success mb-2">
                                    <i class="fa fa-plus-circle me-1"></i> Tambah Lampiran Baru
                                </label>
                                <input type="file" name="files[]" class="form-control" multiple>
                                <div class="form-text text-muted mt-2">
                                    <i class="fa fa-info-circle me-1"></i> Biarkan kosong jika tidak ingin menambah file.
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: KELOLA FILE LAMA --}}
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-secondary"><i class="fa fa-paperclip me-2"></i> Kelola Lampiran</h5>
                    </div>
                    <div class="card-body bg-light">

                        @if($permohonan->attachments->count() > 0)
                            <div class="list-group list-group-flush rounded bg-white border">
                                @foreach($permohonan->attachments as $media)
                                    <div class="list-group-item d-flex align-items-center justify-content-between p-3">

                                        {{-- Wrapper Info File (Kiri) --}}
                                        <div class="d-flex align-items-center overflow-hidden">
                                            {{-- Thumbnail --}}
                                            <div class="me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                                                @if(str_contains($media->mime_type, 'image'))
                                                    <img src="{{ asset('storage/uploads/permohonan_surat/' . $media->file_name) }}"
                                                         class="rounded border"
                                                         style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-light rounded border h-100 w-100">
                                                        <i class="fa fa-file-pdf-o text-danger fs-4"></i>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Nama & Link --}}
                                            <div style="min-width: 0;">
                                                <h6 class="mb-1 text-truncate fw-semibold text-dark" style="font-size: 14px; max-width: 200px;" title="{{ $media->caption }}">
                                                    {{ $media->caption }}
                                                </h6>
                                                <a href="{{ asset('storage/uploads/permohonan_surat/' . $media->file_name) }}"
                                                   target="_blank" class="text-decoration-none small text-primary fw-bold">
                                                   <i class="fa fa-external-link me-1"></i> Lihat
                                                </a>
                                            </div>
                                        </div>

                                        {{-- Tombol Hapus (Kanan) --}}
                                        <div class="ms-2">
                                            <form action="{{ route('permohonan.deleteMedia', $media->media_id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus file ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm p-2 rounded-circle" title="Hapus File">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5 text-muted d-flex flex-column align-items-center justify-content-center h-100">
                                <i class="fa fa-folder-open-o fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0 fw-medium">Belum ada lampiran.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
