@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Berkas: {{ $berka->nama_berkas }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('berkas.update', $berka->berkas_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="permohonan_id" class="form-label">Permohonan ID *</label>
                            <select class="form-control @error('permohonan_id') is-invalid @enderror" 
                                    id="permohonan_id" name="permohonan_id" required>
                                <option value="">Pilih Permohonan</option>
                                @foreach($permohonans as $permohonan)
                                    <option value="{{ $permohonan->id }}" 
                                        {{ old('permohonan_id', $berka->permohonan_id) == $permohonan->id ? 'selected' : '' }}>
                                        {{ $permohonan->id }} - {{ $permohonan->nama_pemohon ?? 'Permohonan #' . $permohonan->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('permohonan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_berkas" class="form-label">Nama Berkas *</label>
                            <input type="text" class="form-control @error('nama_berkas') is-invalid @enderror" 
                                   id="nama_berkas" name="nama_berkas" 
                                   value="{{ old('nama_berkas', $berka->nama_berkas) }}" required>
                            @error('nama_berkas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" 
                                       id="valid" name="valid" value="1" 
                                       {{ old('valid', $berka->valid) ? 'checked' : '' }}>
                                <label class="form-check-label" for="valid">Valid</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection