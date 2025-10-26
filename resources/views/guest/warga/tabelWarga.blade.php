<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Warga</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

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
         margin-bottom: 10px;
         font-size: 14px;
      }

      .badge {
         margin: 3px;
         background-color: #e8edf7;
         color: #001f3f;
         border-radius: 10px;
         font-size: 13px;
         padding: 6px 12px;
         transition: 0.3s;
      }

      .badge:hover {
         background-color: #ff4c4c;
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
      <h2>Daftar Data Warga</h2>

      @if($warga->isEmpty())
         <p class="no-data">Belum ada data warga.</p>
      @else
      <div class="row g-4">
         @foreach($warga as $item)
         <div class="col-md-4 col-sm-6 fade-in">
            <div class="card">
               <h5>{{ $item->nama }}</h5>
               <p class="text-muted">{{ $item->pekerjaan }}</p>

               <div>
                  <span class="badge">KTP: {{ $item->no_ktp }}</span>
                  <span class="badge">{{ $item->gender }}</span>
                  <span class="badge">{{ $item->agama }}</span>
                  <span class="badge">Telp: {{ $item->phone }}</span>
               </div>

               <!-- <div class="actions">
                  <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                  </form>
               </div> -->
            </div>
         </div>
         @endforeach
      </div>
      @endif

      <div class="text-end mt-4">
         <a href="{{ route('warga.create') }}" class="btn btn-primary">+ Tambah Warga</a>
         <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
