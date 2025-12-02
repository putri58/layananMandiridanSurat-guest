@extends('layouts.guest.app')

@section('content')
<section class="pt-5 pb-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">📄 Daftar Permohonan Surat</h2>
            <p class="text-muted">Pantau status pengajuan surat Anda di sini.</p>
        </div>

        {{-- FORM FILTER & PENCARIAN --}}
        <div class="card shadow-sm border-0 mb-4 p-3">
            <form method="GET" action="{{ route('permohonan.index') }}">
                <div class="row g-2">
                    {{-- Filter Status --}}
                    <div class="col-md-3">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">-- Semua Status --</option>
                            <option value="Menunggu" {{ request('status')=='Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Diterima" {{ request('status')=='Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak"  {{ request('status')=='Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    {{-- Search Input --}}
                    <div class="col-md-7">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari nomor surat, nama warga, atau catatan..."
                               value="{{ request('search') }}">
                    </div>

                    {{-- Tombol Cari --}}
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($permohonan as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body position-relative d-flex flex-column">

                       
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">{{ $item->jenisSurat->nama_jenis ?? 'Jenis Tidak Diketahui' }}</h6>
                                    <small class="text-muted">{{ $item->nomor_permohonan }}</small>
                                </div>
                                {{-- Badge Status --}}
                                @php
                                    $badgeClass = match($item->status) {
                                        'Menunggu' => 'bg-warning text-dark',
                                        'Diterima' => 'bg-success',
                                        'Ditolak'  => 'bg-danger',
                                        default    => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($item->status) }}</span>
                            </div>

                            <hr>

                            {{-- BODY CARD --}}
                            <div class="mb-4 flex-grow-1">
                                {{-- 1. Tampilkan Warga (Pemohon) --}}
                                <p class="mb-1 text-sm">
                                    <i class="fa fa-user me-2 text-secondary"></i>
                                    <strong>Pemohon:</strong> {{ $item->warga->nama ?? '-' }}
                                </p>
                                <p class="mb-1 text-sm text-muted ms-4 ps-1">
                                    NIK: {{ $item->warga->no_ktp ?? '-' }}
                                </p>

                                {{-- Tanggal --}}
                                <p class="mb-1 text-sm">
                                    <i class="fa fa-calendar me-2 text-secondary"></i>
                                    {{ date('d M Y', strtotime($item->tanggal_pengajuan)) }}
                                </p>

                                {{-- Catatan --}}
                                <p class="mb-0 text-sm text-muted fst-italic ms-4 ps-1">
                                    "{{ Str::limit($item->catatan, 50) ?? '-' }}"
                                </p>
                            </div>

                            {{-- FOOTER CARD (TOMBOL ACTION) --}}
                            <div class="d-grid gap-2 mt-auto">
                                {{-- Tombol Buka Modal Detail --}}
                                <button type="button" class="btn btn-outline-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetail-{{ $item->permohonan_id }}">
                                    <i class="fa fa-eye me-1"></i> Lihat Detail & Lampiran
                                    @if($item->attachments->count() > 0)
                                        <span class="badge bg-info text-white ms-1">{{ $item->attachments->count() }}</span>
                                    @endif
                                </button>

                                {{-- Tombol Edit (Hanya jika status Menunggu) --}}
                                @if($item->status == 'Menunggu')
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('permohonan.edit', $item->permohonan_id) }}" class="btn btn-warning btn-sm flex-grow-1">
                                            <i class="fa fa-pencil me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('permohonan.destroy', $item->permohonan_id) }}" method="POST" onsubmit="return confirm('Batalkan permohonan ini?');" class="flex-grow-1">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm w-100">
                                                <i class="fa fa-trash me-1"></i> Batal
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                {{-- =========================== --}}
                {{-- MODAL POPUP DETAIL & LAMPIRAN --}}
                {{-- =========================== --}}
                <div class="modal fade" id="modalDetail-{{ $item->permohonan_id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title fw-bold">Detail Permohonan: {{ $item->nomor_permohonan }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                {{-- Info Detail --}}
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Nama Pemohon:</strong></p>
                                        <p class="text-muted">{{ $item->warga->nama ?? '-' }}</p>

                                        <p class="mb-1"><strong>NIK:</strong></p>
                                        <p class="text-muted">{{ $item->warga->no_ktp ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Jenis Surat:</strong></p>
                                        <p class="text-muted">{{ $item->jenisSurat->nama_jenis ?? '-' }}</p>

                                        <p class="mb-1"><strong>Status:</strong></p>
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($item->status) }}</span>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="p-3 bg-light border rounded">
                                            <strong class="d-block mb-1">Catatan:</strong>
                                            {{ $item->catatan ?? 'Tidak ada catatan.' }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h6 class="fw-bold mb-3"><i class="fa fa-paperclip me-2"></i> Berkas Lampiran</h6>

                                {{-- 2. Tampilkan Media (Looping) --}}
                                @if($item->attachments->count() > 0)
                                    <div class="row g-3">
                                        @foreach($item->attachments as $media)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="card h-100 border shadow-sm">
                                                    <div class="card-body text-center p-2 d-flex flex-column">

                                                        {{-- Preview Gambar --}}
                                                        <div class="mb-2 d-flex align-items-center justify-content-center" style="height: 100px; overflow: hidden;">
                                                            @if(str_contains($media->mime_type, 'image'))
                                                                <img src="{{ asset('storage/uploads/permohonan_surat/' . $media->file_name) }}"
                                                                     class="img-fluid rounded"
                                                                     style="height: 100%; width: 100%; object-fit: cover;"
                                                                     alt="Lampiran"
                                                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/150?text=Gambar+Rusak';">
                                                            @else
                                                                <div class="text-danger">
                                                                    <i class="fa fa-file-pdf-o fa-3x"></i>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <p class="small text-truncate mb-2 text-muted" title="{{ $media->caption }}">
                                                            {{ $media->caption }}
                                                        </p>

                                                        <a href="{{ asset('storage/uploads/permohonan_surat/' . $media->file_name) }}"
                                                           target="_blank"
                                                           class="btn btn-sm btn-primary w-100 mt-auto">
                                                            <i class="fa fa-download me-1"></i> Lihat / Unduh
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-secondary text-center py-3">
                                        <i class="fa fa-ban me-2"></i> Tidak ada berkas lampiran.
                                    </div>
                                @endif

                            </div>
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END MODAL --}}

            @empty
                <div class="col-12">
                    <div class="text-center py-5 text-muted">
                        <i class="fa fa-folder-open fa-3x mb-3 opacity-50"></i>
                        <h5>Belum ada permohonan surat.</h5>
                        <a href="{{ route('permohonan.create') }}" class="btn btn-primary mt-2">Buat Permohonan Baru</a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $permohonan->links('pagination::bootstrap-5') }}
        </div>

        <div class="text-center mt-5 pb-5">
            <a href="{{ route('permohonan.create') }}" class="btn btn-lg btn-success shadow-sm rounded-pill px-5">
                <i class="fa fa-plus-circle me-1"></i> Buat Permohonan Baru
            </a>
            <div class="mt-3">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted">⬅ Kembali ke Beranda</a>
            </div>
        </div>

    </div>
</section>
@endsection
