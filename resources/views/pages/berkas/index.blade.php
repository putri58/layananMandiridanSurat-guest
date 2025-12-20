@extends('layouts.guest.app')

@section('content')

{{-- HEADER --}}
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h1 class="h4 mb-1">Data Berkas Persyaratan</h1>
            <p class="mb-0 text-muted">Daftar berkas yang sudah diupload</p>
        </div>
        <div>
            <a href="{{ route('berkas.create') }}" class="btn btn-primary">
                <i class="fas fa-upload me-1"></i> Upload Berkas
            </a>
        </div>
    </div>
</div>

{{-- INFO CARD --}}
@if(auth()->user()->role === 'warga' || auth()->user()->role === 'guest')
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-info bg-opacity-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle fa-2x text-info me-3"></i>
                    <div>
                        <h6 class="mb-1 text-info">Informasi untuk Warga</h6>
                        <p class="mb-0 small">
                            Anda hanya dapat melihat dan mengelola berkas dari permohonan yang Anda buat. 
                            Status "Valid" akan diberikan oleh admin setelah verifikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- DATA --}}
@if($berkas->isEmpty())
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-file-upload fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada berkas</h5>
                <p class="text-muted mb-3">Anda belum mengupload berkas persyaratan</p>
                <a href="{{ route('berkas.create') }}" class="btn btn-primary">
                    <i class="fas fa-upload me-1"></i> Upload Berkas Pertama
                </a>
            </div>
        </div>
    </div>
</div>
@else

<div class="row g-4">
    @foreach ($berkas as $item)
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom pb-0">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <h6 class="mb-1 text-truncate" title="{{ $item->nama_berkas }}">
                            <i class="fas fa-file me-2"></i>{{ $item->nama_berkas }}
                        </h6>
                    </div>
                    <span class="badge {{ $item->valid ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $item->valid ? 'Valid' : 'Belum Valid' }}
                    </span>
                </div>
            </div>

            <div class="card-body">
                {{-- INFO PERMOHONAN --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-user text-muted me-2"></i>
                        <span class="small">
                            <strong>Pemohon:</strong> 
                            {{ $item->permohonanSurat->warga->nama_lengkap ?? 'Tidak Diketahui' }}
                        </span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-file-alt text-muted me-2"></i>
                        <span class="small">
                            <strong>Jenis Surat:</strong> 
                            {{ $item->permohonanSurat->jenisSurat->nama_jenis ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar text-muted me-2"></i>
                        <span class="small">
                            <strong>Upload:</strong> 
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                </div>

                @foreach ($berkas as $item)

    @php
        $media = $item->media->first();
    @endphp

    <!-- @if($media)
        <a href="{{ asset('storage/berkas/' . $media->file_name) }}"
           target="_blank"
           class="btn btn-sm btn-outline-primary">
            Lihat File
        </a>
    @else
        <span class="text-danger">File tidak ditemukan</span>
    @endif -->

@endforeach

                {{-- ACTION BUTTONS --}}
                <div class="d-flex gap-2">
                    @if($media)
        <a href="{{ asset('storage/berkas/' . $media->file_name) }}"
                       class="btn btn-outline-warning btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Lihat File
                    </a>
    @else
        <span class="text-danger">File tidak ditemukan</span>
    @endif
                    <a href="{{ route('berkas.edit', $item->berkas_id) }}"
                       class="btn btn-outline-warning btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div>

            <div class="card-footer bg-transparent border-top py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fas fa-hashtag me-1"></i>ID: {{ $item->berkas_id }}
                    </small>
                    
                    <form action="{{ route('berkas.destroy', $item->berkas_id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus berkas ini?')">
                            <i class="fas fa-trash">Hapus</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex gap-2">
                    <a href="{{ route('dashboard', $item->berkas_id) }}" 
                       class="btn btn-outline-info btn-sm flex-fill">
                        <i class="fas fa-eye me-1"></i> Kembali
                    </a>
            </div>  

{{-- PAGINATION --}}
@if($berkas->hasPages())
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        Menampilkan {{ $berkas->firstItem() }} - {{ $berkas->lastItem() }} dari {{ $berkas->total() }} berkas
                    </div>
                    {{ $berkas->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endif

@endsection