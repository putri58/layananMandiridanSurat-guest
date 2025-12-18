@extends('layouts.guest.app')

@section('content')

{{-- HEADER --}}
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h1 class="h4 mb-1">Data Berkas</h1>
            <p class="mb-0 text-muted">Daftar berkas permohonan surat</p>
        </div>
        <div>
            <a href="{{ route('berkas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Berkas
            </a>
        </div>
    </div>
</div>

{{-- FILTER CARD --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light py-3">
                <h6 class="mb-0">
                    <i class="fas fa-filter me-2"></i> Filter & Pencarian
                </h6>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('berkas.index') }}">
                    <div class="row g-3">

                        {{-- FILTER STATUS --}}
                        <div class="col-md-3">
                            <label class="form-label">Status Berkas</label>
                            <select name="valid" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="1" {{ request('valid') === '1' ? 'selected' : '' }}>
                                    Valid
                                </option>
                                <option value="0" {{ request('valid') === '0' ? 'selected' : '' }}>
                                    Tidak Valid
                                </option>
                            </select>
                        </div>

                        {{-- SEARCH --}}
                        <div class="col-md-6">
                            <label class="form-label">Cari Berkas</label>
                            <div class="input-group">
                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       value="{{ request('search') }}"
                                       placeholder="Cari nama berkas atau nama warga...">

                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>

                                @if(request('search'))
                                    <a href="{{ route('berkas.index') }}"
                                       class="btn btn-outline-secondary">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- DATA --}}
@if($berkas->isEmpty())
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data berkas</h5>
                <p class="text-muted mb-0">Silakan tambahkan berkas baru</p>
            </div>
        </div>
    </div>
</div>
@else

<div class="row g-4">
    @foreach ($berkas as $item)
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h5 class="mb-1">{{ $item->nama_berkas }}</h5>

                        <small class="text-muted">
                            <i class="fas fa-user me-1"></i>
                            {{ $item->permohonan->warga->nama_lengkap ?? '-' }}
                        </small>
                    </div>

                    <span class="badge {{ $item->valid ? 'bg-success' : 'bg-secondary' }}">
                        {{ $item->valid ? 'Valid' : 'Tidak Valid' }}
                    </span>
                </div>

                {{-- INFO --}}
                <div class="mb-3">
                    <div class="row g-2 small">
                        <div class="col-6">
                            <span class="text-muted d-block">Permohonan</span>
                            <strong>
                                #{{ str_pad($item->permohonan_surat_id, 4, '0', STR_PAD_LEFT) }}
                            </strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">Tanggal</span>
                            <strong>
                                {{ $item->created_at?->format('d/m/Y') ?? '-' }}
                            </strong>
                        </div>
                    </div>
                </div>

                {{-- ACTION --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('berkas.edit', $item->id) }}"
                       class="btn btn-outline-warning btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>

                    <form action="{{ route('berkas.destroy', $item->id) }}"
                          method="POST"
                          class="flex-fill">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-outline-danger btn-sm w-100"
                                onclick="return confirm('Yakin ingin menghapus berkas ini?')">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer bg-transparent border-top small text-muted d-flex justify-content-between">
                <span>
                    <i class="fas fa-clock me-1"></i>
                    {{ $item->created_at?->diffForHumans() ?? '-' }}
                </span>
                <span>ID: {{ $item->id }}</span>
            </div>

        </div>
    </div>
    @endforeach
</div>

{{-- PAGINATION --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                {{ $berkas->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endif

@endsection
