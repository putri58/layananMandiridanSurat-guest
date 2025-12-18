{{-- resources/views/pages/riwayat_status_surat/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="mb-3">Riwayat Status Surat</h5>

    <a href="{{ route('riwayat-status-surat.create') }}" class="btn btn-primary mb-3">
        Tambah Riwayat
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Permohonan</th>
                <th>Status</th>
                <th>Petugas</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->riwayat_id }}</td>
                <td>#{{ $item->permohonan_id }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->petugas->nama_lengkap ?? '-' }}</td>
                <td>{{ $item->waktu->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('riwayat-status-surat.edit', $item) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('riwayat-status-surat.destroy', $item) }}"
                          method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
</div>
@endsection
