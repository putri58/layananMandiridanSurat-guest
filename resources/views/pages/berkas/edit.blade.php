@extends('layouts.guest.app')

@section('content')
<div class="container py-4">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Edit Berkas Persyaratan</h5>
            </div>

            <form method="POST"
                  action="{{ route('berkas.update', $berkas->berkas_id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Permohonan</label>
                        <input type="text"
                               class="form-control"
                               value="#{{ str_pad($berkas->permohonanSurat->permohonan_id,4,'0',STR_PAD_LEFT) }}
                               - {{ $berkas->permohonanSurat->pemohon->nama_lengkap }}
                               ({{ $berkas->permohonanSurat->jenisSurat->nama_jenis }})"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Berkas</label>
                        <input type="text"
                               name="nama_berkas"
                               class="form-control"
                               value="{{ old('nama_berkas', $berkas->nama_berkas) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti File (Opsional)</label>
                        <input type="file"
                               name="berkas_file"
                               class="form-control"
                               accept=".pdf,.jpg,.jpeg,.png">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('berkas.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button class="btn btn-primary">
                            Update
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
