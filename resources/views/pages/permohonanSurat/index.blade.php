<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Permohonan Surat</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
@extends('layouts.guest.app')
@section('content')
    <style>
        body {
            background-color: #f3f6fa;
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            text-align: center;
            font-weight: 700;
            color: #0d1b2a;
            margin: 50px 0 30px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: #fff;
            position: relative;
            overflow: hidden;
            padding: 25px 20px;
            text-align: center;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            /* Gradient yang sama dengan contoh */
            background: linear-gradient(90deg, #001f3f, #ff4c4c);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .card h5 {
            font-weight: 600;
            color: #001f3f;
            margin-top: 10px;
        }
        
        .card p {
            color: #666;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .badge-status {
             margin: 3px;
            border-radius: 10px;
            font-size: 13px;
            padding: 6px 12px;
            transition: 0.3s;
            font-weight: 600;
        }
        
        .badge-info {
            background-color: #e8edf7;
            color: #001f3f;
        }

        .badge-status.Pending {
            background-color: #ffb84d; /* Warna Kuning untuk Pending */
            color: #333;
        }
        
        .badge-status.Approved {
            background-color: #28a745; /* Warna Hijau untuk Approved */
            color: white;
        }

        .badge-status.Rejected {
            background-color: #ff4c4c; /* Warna Merah untuk Rejected */
            color: white;
        }

        .actions {
            margin-top: 18px;
        }

        .btn {
            border-radius: 8px;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .btn-warning {
            background-color: #ffb84d;
            border: none;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #ff9800;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #ff4c4c;
            border: none;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #e63946;
            transform: scale(1.05);
        }

        .btn-primary {
            background-color: #001f3f;
            border: none;
        }

        .btn-primary:hover {
            background-color: #002b5c;
        }

        .no-data {
            text-align: center;
            color: #777;
            font-style: italic;
            margin-top: 40px;
        }

        .card-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Animasi muncul halus */
        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="container card-container">
        <h2>Daftar Permohonan Surat</h2>

        <!-- Data Mockup untuk Simulasi Blade -->
        <script>
            // Data Permohonan Surat berdasarkan struktur model PermohonanSurat
            const permohonanSurat = [
                {
                    nomor_permohonan: 'PS/2025/001',
                    nama_pemohon: 'John Doe',
                    jenis_surat: 'Surat Keterangan Usaha',
                    tanggal_pengajuan: '2025-10-01',
                    status: 'Approved',
                    catatan: 'Dokumen lengkap dan sah.'
                },
                {
                    nomor_permohonan: 'PS/2025/002',
                    nama_pemohon: 'Jane Smith',
                    jenis_surat: 'Surat Pengantar RT/RW',
                    tanggal_pengajuan: '2025-10-05',
                    status: 'Pending',
                    catatan: 'Menunggu verifikasi ketua RT.'
                },
                {
                    nomor_permohonan: 'PS/2025/003',
                    nama_pemohon: 'Budi Santoso',
                    jenis_surat: 'Surat Izin Keramaian',
                    tanggal_pengajuan: '2025-10-15',
                    status: 'Rejected',
                    catatan: 'Tujuan pengajuan tidak sesuai peraturan.'
                }
            ];
            
            // Render data menggunakan JavaScript untuk simulasi Blade
            document.addEventListener('DOMContentLoaded', () => {
                const rowContainer = document.getElementById('permohonan-row');
                const noData = document.getElementById('no-data-message');
                
                if (permohonanSurat.length === 0) {
                    rowContainer.innerHTML = '<p class="no-data">Belum ada data permohonan surat.</p>';
                    noData.style.display = 'block';
                    return;
                }

                noData.style.display = 'none';

                permohonanSurat.forEach((item, index) => {
                    const statusClass = item.status; // Approved, Pending, Rejected
                    
                    const cardHtml = `
                        <div class="col-md-4 col-sm-6 fade-in" style="animation-delay: ${index * 0.1}s;">
                            <div class="card">
                                <h5>${item.jenis_surat}</h5>
                                
                                <div>
                                    <span class="badge badge-info" title="Nomor Permohonan">${item.nomor_permohonan}</span>
                                    <span class="badge badge-info" title="Nama Pemohon">${item.nama_pemohon}</span>
                                </div>
                                <p class="mt-2">Diajukan: ${item.tanggal_pengajuan}</p>

                                <span class="badge-status ${statusClass}">${item.status.toUpperCase()}</span>

                                <p style="font-size:12px; margin-top:10px; font-style: italic; color:#a0a0a0;">Catatan: ${item.catatan.substring(0, 40)}...</p>

                                <div class="actions">
                                    <a href="#" class="btn btn-warning">Detail</a>
                                    <a href="#" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    `;
                    rowContainer.innerHTML += cardHtml;
                });
            });
        </script>
        
        <p class="no-data" id="no-data-message" style="display: none;">Belum ada data permohonan surat.</p>
        
        <!-- ROW CONTAINER TEMPAT CARD DI-RENDER JS -->
        <div class="row g-4" id="permohonan-row">
            <!-- Card akan dimasukkan di sini oleh JavaScript -->
        </div>

        <div class="text-end mt-4">
            <a href="#" class="btn btn-primary">Kembali ke Dashboard</a>
            <a href="#" class="btn btn-primary">+ Ajukan Permohonan Baru</a>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection
</html>