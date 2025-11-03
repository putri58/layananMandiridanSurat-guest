<!DOCTYPE html>
<html lang="id">

<head>
    @extends('layouts.guest.app')
    @section('content')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Jenis Surat</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <style>
            body {
                background-color: #f7f8fc;
                font-family: 'Poppins', sans-serif;
            }

            h2 {
                text-align: center;
                color: #0a1931;
                font-weight: 700;
                margin-top: 40px;
                margin-bottom: 30px;
            }

            .container-cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
                max-width: 1100px;
                margin: auto;
                padding: 20px;
            }

            .card-jenis {
                background-color: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                overflow: hidden;
                transition: all 0.3s ease;
                border-top: 6px solid #0a1931;
                position: relative;
            }

            .card-jenis:hover {
                transform: translateY(-6px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            }

            .card-header {
                height: 140px;
                background: linear-gradient(135deg, #0a1931, #c82333);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                color: #fff;
                text-align: center;
                font-weight: 600;
                font-size: 1.1rem;
                position: relative;
            }

            .card-header i {
                font-size: 35px;
                margin-bottom: 8px;
                color: #fff;
            }

            .card-body {
                padding: 20px;
            }

            .kode-badge {
                display: inline-block;
                background: #0a1931;
                color: white;
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 0.85rem;
                margin-bottom: 12px;
            }

            .card-body h5 {
                font-weight: 600;
                color: #0a1931;
                margin-bottom: 10px;
                text-align: center;
            }

            .card-body ul {
                padding-left: 18px;
                margin-bottom: 0;
            }

            .card-body li {
                font-size: 0.9rem;
                color: #333;
                line-height: 1.5;
            }

            .btn-detail {
                display: inline-block;
                text-decoration: none;
                background-color: #c82333;
                color: #fff;
                padding: 8px 14px;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .btn-detail:hover {
                background-color: #0a1931;
                color: #fff;
            }

            .card-footer {
                text-align: center;
                padding: 15px;
                background-color: #f8f9fa;
            }

            .btn-add {
                background-color: #c82333;
                border: none;
                font-weight: 500;
                padding: 10px 18px;
                border-radius: 8px;
                color: white;
                transition: all 0.3s ease;
            }

            .btn-add:hover {
                background-color: #0a1931;
            }
        </style>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/a2e0ad2d3c.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <h2>📋 Daftar Jenis Surat</h2>

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

        <div class="text-center my-4">
             <a href="{{ route('jenis-surat.create') }}" class="btn btn-primary">+ Tambah Jenis Surat</a>
            <a href="{{ route('dashboard') }}" class="btn-add">⬅ Kembali ke Dashboard</a>
        </div>

        <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
        @endsection
    </body>

    </html>
