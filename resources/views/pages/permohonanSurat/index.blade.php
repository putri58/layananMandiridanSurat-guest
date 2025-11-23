 @extends('layouts.guest.app')
    @section('content')

    <h2>📄 Daftar Permohonan Surat</h2>
<form method="GET" class="d-flex gap-2 mb-3">

    <!-- <select name="jenis_id" class="form-select">
    <option value="">-- Filter Jenis Surat --</option>
    @foreach($jenisSurat as $item)
        <option value="{{ $item->jenis_id }}"
            {{ request('jenis_id') == $item->jenis_id ? 'selected' : '' }}>
            {{ $item->nama_jenis }}
        </option>
    @endforeach
</select> -->


    <select name="status" class="form-select">
        <option value="">-- Filter Status --</option>
        <option value="pending"  {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
        <option value="selesai"  {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
        <option value="ditolak"  {{ request('status')=='ditolak' ? 'selected' : '' }}>Ditolak</option>
        <button class="btn btn-primary">Filter</button>
    </select>

    <input type="text" name="search" placeholder="Cari permohonan..." 
           value="{{ request('search') }}" class="form-control">

    <button class="btn btn-primary">Filter</button>
</form>

    <div class="container-cards">

        @forelse($permohonan as $item)
            <div class="card-permohonan">
                
                <h5><strong>Nomor:</strong> {{ $item->nomor_permohonan }}</h5>

                <p><strong>Tanggal Pengajuan:</strong> {{ $item->tanggal_pengajuan }}</p>

                <p><strong>Jenis Surat:</strong> 
                    {{ $item->jenisSurat->nama_jenis ?? 'Tidak ditemukan' }}
                </p>

                <p><strong>Status:</strong>
                    @if($item->status == 'menunggu')
                        <span class="badge-status badge-menunggu">MENUNGGU</span>
                    @elseif($item->status == 'diterima')
                        <span class="badge-status badge-diterima">DITERIMA</span>
                    @else
                        <span class="badge-status badge-ditolak">DITOLAK</span>
                    @endif
                </p>

                <p><strong>Catatan:</strong> {{ $item->catatan ?? '-' }}</p>

            </div>
        @empty
            <p class="text-center text-muted">Belum ada permohonan surat.</p>
        @endforelse

    </div>
<div class="mt-3">
        {{ $permohonan->links('pagination::bootstrap-5') }}
   </div>
    <div class="text-center my-4">
        <a href="{{ route('permohonan.create') }}" class="btn btn-primary">+ Buat Permohonan</a>
        <a href="{{ route('dashboard') }}" class="btn-add">⬅ Kembali ke Dashboard</a>
    </div>
@endsection
