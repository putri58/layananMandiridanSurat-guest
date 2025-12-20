@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h5 class="mb-3">Riwayat Status Surat</h5>

    @forelse ($data as $item)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <strong>
                    {{ $item->permohonan->jenisSurat->nama_jenis }}
                </strong>

                <div class="mt-2">
                    <span class="badge bg-primary">
                        {{ $item->status }}
                    </span>
                </div>

                <small class="text-muted d-block mt-2">
                    {{ \Carbon\Carbon::parse($item->waktu)->format('d M Y H:i') }}
                </small>

                @if($item->keterangan)
                    <div class="mt-2">
                        <small>{{ $item->keterangan }}</small>
                    </div>
                @endif

                <div class="mt-2">
                    <small class="text-muted">
                        Petugas: {{ $item->petugas->nama ?? '-' }}
                    </small>
                </div>

            </div>
        </div>
    @empty
        <div class="alert alert-warning">
            Belum ada riwayat status surat.
        </div>
    @endforelse

    {{ $data->links() }}
</div>
@endsection
