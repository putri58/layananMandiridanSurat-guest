 @extends('layouts.guest.app')
    @section('content')

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/a2e0ad2d3c.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <h2>📋 Daftar Jenis Surat</h2>
<form method="GET" class="mb-3 d-flex gap-2">

    <!-- Filter berdasarkan kode -->
    <select name="kode" class="form-control">
        <option value="">- Semua Kode -</option>
        @foreach ($filter as $f)
            <option value="{{ $f->kode }}" {{ request('kode') == $f->kode ? 'selected' : '' }}>
                {{ $f->kode }}
            </option>
        @endforeach
    </select>

    <!-- Search -->
    <input type="text" name="search" class="form-control" 
           placeholder="Cari jenis surat..." value="{{ request('search') }}">
    
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

        <div class="container-cards">
            @forelse($jenisSurat as $item)
                <div class="card-jenis">
                    <div class="card-header">
                        <i class="fas fa-file-alt"></i>
                        {{ $item->nama_jenis }}
                    </div>
                    <div class="card-body text-center">
                        <span class="kode-badge">Kode: {{ $item->kode }}</span>
                        <h5>Syarat Pengajuan:</h5>
                        @php
                            $syarat = json_decode($item->syarat_json, true);
                        @endphp
                        @if (is_array($syarat))
                            <ul class="text-start">
                                @foreach ($syarat as $s)
                                    <li>{{ $s }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{ $item->syarat_json }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data jenis surat.</p>
            @endforelse
        </div>
 <div class="mt-3">
        {{ $jenisSurat->links('pagination::bootstrap-5') }}
   </div>
        <div class="text-center my-4">
             <a href="{{ route('jenis-surat.create') }}" class="btn btn-primary">+ Tambah Jenis Surat</a>
            <a href="{{ route('dashboard') }}" class="btn-add">⬅ Kembali ke Dashboard</a>
        </div>

        <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
        @endsection
