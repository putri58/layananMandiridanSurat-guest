@extends('layouts.guest.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-semibold">Tambah Berkas</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('berkas.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- PERMOHONAN SURAT --}}
                        <div class="mb-3">
                            <label class="form-label">Permohonan Surat</label>

                            {{-- value yang dikirim ke controller --}}
                            <input type="hidden"
                                   name="permohonan_surat_id"
                                   id="permohonan_surat_id"
                                   value="{{ old('permohonan_surat_id') }}"
                                   required>

                            <div class="filter-select" id="permohonanSelect">
                                <div class="filter-select-box" id="permohonanToggle">
                                    <span id="permohonanLabel">
                                        -- Pilih Permohonan Surat --
                                    </span>
                                    <span class="caret">▾</span>
                                </div>

                                <div class="filter-dropdown">
                                    <input type="text"
                                           class="filter-input"
                                           placeholder="Cari permohonan...">

                                    <div class="filter-options">
                                        @foreach ($permohonans as $p)
                                            <div class="filter-option"
                                                 data-id="{{ $p->permohonan_id }}">
                                                #{{ str_pad($p->permohonan_id, 4, '0', STR_PAD_LEFT) }}
                                                — {{ $p->warga->nama_lengkap ?? 'Tanpa Nama' }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @error('permohonan_surat_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- NAMA BERKAS --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Berkas</label>
                            <input type="text"
                                   name="nama_berkas"
                                   class="form-control"
                                   placeholder="Contoh: KTP, KK, Surat Domisili"
                                   required>
                        </div>
                        {{-- MEDIA / FILE BERKAS --}}
<div class="mb-4">
    <label class="form-label">Upload File Berkas</label>

    <input type="file"
           name="media[]"
           class="form-control"
           multiple
           accept=".pdf,.jpg,.jpeg,.png">

    <small class="text-muted">
        Format yang diperbolehkan: PDF, JPG, PNG. Bisa upload lebih dari satu file.
    </small>

    @error('media')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror

    @error('media.*')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
</div>


                        {{-- STATUS VALID --}}
<div class="mb-4">
    <div class="form-check d-flex align-items-center gap-2">
        <input class="form-check-input mt-0"
               type="checkbox"
               name="valid"
               value="1"
               id="valid">

        <label class="form-check-label fw-semibold" for="valid">
            Tandai sebagai valid
        </label>
    </div>

    <small class="text-muted d-block ms-4 mt-1">
        Centang jika berkas sudah diverifikasi dan memenuhi persyaratan
    </small>
</div>


                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('berkas.index') }}" class="btn btn-light">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
