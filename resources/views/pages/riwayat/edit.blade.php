@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Edit Riwayat Status</h5>

    <form method="POST"
          action="{{ route('riwayat-status-surat.update', $riwayat_status_surat) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status"
                   value="{{ $riwayat_status_surat->status }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <select name="petugas_warga_id" class="form-control" required>
                @foreach ($petugas as $w)
                    <option value="{{ $w->id }}"
                        {{ $riwayat_status_surat->petugas_warga_id == $w->id ? 'selected' : '' }}>
                        {{ $w->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan"
                      class="form-control">{{ $riwayat_status_surat->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('riwayat-status-surat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
