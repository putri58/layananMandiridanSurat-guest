@extends('layouts.guest.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-semibold">Tambah Berkas Persyaratan</h5>
                </div>

                <div class="card-body">
                    <form method="POST"
                          action="{{ route('berkas.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- PERMOHONAN SURAT --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium">Permohonan Surat</label>

                            <select class="form-select @error('permohonan_id') is-invalid @enderror"
                                    name="permohonan_id"
                                    required>
                                <option value="">-- Pilih Permohonan Surat --</option>

                                @foreach ($permohonan as $p)
                                    <option value="{{ $p->permohonan_id }}"
                                        {{ old('permohonan_id') == $p->permohonan_id ? 'selected' : '' }}>
                                        #{{ str_pad($p->permohonan_id, 4, '0', STR_PAD_LEFT) }}
                                        - {{ $p->pemohon->nama_lengkap }}
                                        ({{ $p->jenisSurat->nama_jenis }})
                                    </option>
                                @endforeach
                            </select>

                            @error('permohonan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($permohonan->isEmpty())
                                <div class="alert alert-warning mt-2">
                                    Tidak ada permohonan aktif.
                                </div>
                            @endif
                        </div>

                        {{-- NAMA BERKAS --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium">Nama Berkas</label>
                            <input type="text"
                                   name="nama_berkas"
                                   class="form-control @error('nama_berkas') is-invalid @enderror"
                                   value="{{ old('nama_berkas') }}"
                                   required>
                            @error('nama_berkas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- FILE --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Upload File</label>
                            <input type="file"
                                   name="berkas_file"
                                   class="form-control @error('berkas_file') is-invalid @enderror"
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   required>
                            @error('berkas_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('berkas.index') }}"
                               class="btn btn-outline-secondary">Kembali</a>

                            <button type="submit"
                                    class="btn btn-primary"
                                    {{ $permohonan->isEmpty() ? 'disabled' : '' }}>
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
