@extends('layouts.guest.app')

@section('content')

<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data User</h1>
            <p class="mb-0">Daftar pengguna sistem</p>
        </div>
        <div>
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus me-1"></i> Tambah User
            </a>
        </div>
    </div>
</div>

{{-- FILTER CARD --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header bg-light py-3">
                <h6 class="mb-0"><i class="fas fa-filter me-2"></i>Filter & Pencarian</h6>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('user.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Status Verifikasi</label>
                            <select name="verified" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="verified" {{ request('verified') == 'verified' ? 'selected' : '' }}>
                                    Terverifikasi
                                </option>
                                <option value="unverified" {{ request('verified') == 'unverified' ? 'selected' : '' }}>
                                    Belum Terverifikasi
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Cari User</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    value="{{ request('search') }}" placeholder="Cari nama atau email...">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if (request('search'))
                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
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

{{-- USER CARDS --}}
@if($user->isEmpty())
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data user</h5>
                <p class="text-muted mb-0">Silakan tambahkan user baru</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="row g-4">
    @foreach ($user as $item)
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card border-0 shadow h-100">
            <div class="card-body">
                {{-- USER HEADER --}}
                <div class="d-flex align-items-start mb-3">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">{{ $item->name }}</h5>
                        <p class="text-muted small mb-2">
                            <i class="fas fa-envelope me-1"></i> {{ $item->email }}
                        </p>
                        <span class="badge bg-info">
                            <i class="fas fa-user-tag me-1"></i> {{ $item->role_label ?? 'User' }}
                        </span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" 
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show', $item->id) }}">
                                    <i class="fas fa-eye me-2"></i> Detail
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}">
                                    <i class="fas fa-edit me-2"></i> Edit
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" 
                                            onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="fas fa-trash me-2"></i> Hapus
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- USER INFO --}}
                <div class="mb-3">
                    <div class="row g-2">
                        <div class="col-6">
                            <small class="text-muted d-block">ID User</small>
                            <span class="fw-semibold">#{{ $item->id }}</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block">Tanggal Daftar</small>
                            <span class="fw-semibold">
                                {{ $item->created_at ? $item->created_at->format('d/m/Y') : '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('profile.show', $item->id) }}" 
                       class="btn btn-outline-primary btn-sm flex-fill">
                        <i class="fas fa-eye me-1"></i> Detail
                    </a>
                    <a href="{{ route('user.edit', $item->id) }}" 
                       class="btn btn-outline-warning btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div>
            
            {{-- CARD FOOTER --}}
            <div class="card-footer bg-transparent border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>
                        {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                    </small>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- PAGINATION --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body">
                {{ $user->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endif

{{-- BACK BUTTON --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08) !important;
}

.card-title {
    color: #2c3e50;
    font-weight: 600;
}

.dropdown-toggle::after {
    display: none;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}
</style>

@endsection