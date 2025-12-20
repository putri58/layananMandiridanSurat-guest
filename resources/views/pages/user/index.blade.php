@extends('layouts.guest.app')
@section('content')

<style>
.card-container {
    margin-top: 30px;
}

.profile-wrapper {
    display: flex;
    justify-content: center;
    position: relative;
    margin-bottom: 15px;
}

.profile-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #e9ecef;
}

.profile-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #6c757d;
    color: #ffffff;
    font-size: 28px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-edit {
    position: absolute;
    top: 12px;
    right: 12px;
    background: #ffffff;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    border: 1px solid #dee2e6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    transition: 0.2s;
    z-index: 10;
    text-decoration: none;
}

.btn-edit:hover {
    background: #f1f3f5;
    transform: scale(1.05);
}

.card {
    border-radius: 12px;
    padding: 20px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: 0.2s;
}

.card:hover {
    transform: translateY(-3px);
}

.badge-role {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.8rem;
}

.no-data {
    text-align: center;
    color: #6c757d;
    margin-top: 30px;
}
</style>

<div class="container card-container">
    <h2>Daftar Data User</h2>

    <form method="GET" action="{{ route('user.index') }}" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="role" class="form-select">
                    <option value="">All Roles</option>
                    <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Mitra" {{ request('role') == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                    <option value="Pelanggan" {{ request('role') == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                </select>
            </div>

            <div class="col-md-6">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari User..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    Filter
                </button>
            </div>
        </div>
    </form>

    @if($user->isEmpty())
        <p class="no-data">Belum ada data user.</p>
    @else

    <div class="row g-4">
        @foreach($user as $item)
        <div class="col-md-4 col-sm-6 fade-in">
            <div class="card position-relative">

                <a href="{{ route('user.edit', $item->id) }}"
                   class="btn-edit"
                   title="Edit User">
                    ✏️
                </a>

                <div class="profile-wrapper">
                    @if($item->profile_picture)
                        <img src="{{ asset('storage/'.$item->profile_picture) }}"
                             class="profile-img">
                    @else
                        <div class="profile-placeholder">
                            {{ strtoupper(substr($item->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <h5 class="text-center mb-1">{{ $item->name }}</h5>
                <p class="text-muted text-center mb-2">{{ $item->email }}</p>

                <div class="text-center">
                    <span class="badge badge-role
                        @if($item->role == 'Admin') bg-danger
                        @elseif($item->role == 'Mitra') bg-warning text-dark
                        @else bg-primary
                        @endif">
                        {{ $item->role }}
                    </span>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $user->links('pagination::bootstrap-5') }}
    </div>

    @endif

    <div class="text-end mt-4">
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>

@endsection
