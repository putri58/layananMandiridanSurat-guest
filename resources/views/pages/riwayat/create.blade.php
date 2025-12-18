@extends('layouts.guest.app')

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-semibold mb-1">Tambah Riwayat Status Surat</h4>
        <p class="text-muted mb-0">Catat perubahan status permohonan surat</p>
    </div>

    {{-- CARD FORM --}}
    <div class="card riwayat-card border-0 shadow-sm">
        <div class="card-body">

            {{-- ALERT ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('riwayat.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-md-3">
    <label class="form-label">Permohonan Surat</label>
    <select name="permohonan_surat_id"
            class="form-select"
            onchange="this.form.submit()">
        <option value="">Semua Permohonan</option>

        @foreach ($permohonans as $p)
            <option value="{{ $p->permohonan_id }}"
                {{ request('permohonan_surat_id') == $p->permohonan_id ? 'selected' : '' }}>
                {{ $p->permohonan_id }}
            </option>
        @endforeach
    </select>
</div>


                    {{-- STATUS --}}
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select status-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>
                        </select>
                    </div>

                    {{-- PETUGAS --}}
                    <div class="col-md-6">
                        <label class="form-label">Petugas</label>
                        <select name="petugas_warga_id" class="form-select" required>
                            <option value="">-- Pilih Petugas --</option>
                            @foreach ($petugas as $p)
                                <option value="{{ $p->id }}"
                                    {{ old('petugas_warga_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_lengkap ?? 'Tanpa Nama' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- KETERANGAN --}}
                    <div class="col-md-12">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">
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
@endsection
