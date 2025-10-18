<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form Jenis Surat</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

   <style>
      body {
         background-color: #f8f9fa;
         font-family: 'Poppins', sans-serif;
      }

      .navbar {
         background: #fff;
         box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }

      .form-container {
         background: #fff;
         padding: 40px 50px;
         border-radius: 15px;
         box-shadow: 0 4px 20px rgba(0,0,0,0.1);
         max-width: 600px;
         margin: 80px auto;
         transition: all 0.3s ease;
      }

      .form-container:hover {
         transform: translateY(-5px);
      }

      h2 {
         text-align: center;
         color: #007bff;
         font-weight: 700;
         margin-bottom: 30px;
      }

      label {
         font-weight: 600;
      }

      .btn-primary {
         background-color: #007bff;
         border: none;
         transition: all 0.3s ease;
      }

      .btn-primary:hover {
         background-color: #0056b3;
         transform: scale(1.03);
      }

      .form-control:focus {
         box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
         border-color: #007bff;
      }

      .navbar-brand {
         color: #007bff !important;
      }

      .nav-link.active {
         color: #007bff !important;
      }
   </style>
</head>

<body>
    
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
         <a class="navbar-brand fw-bold text-uppercase" href="#">Layanan Mandiri</a>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('jenis-surat.index') }}">Data Jenis Surat</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active fw-semibold" href="{{ route('jenis-surat.create') }}">Tambah Jenis Surat</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Form -->
     @if (session('info'))
    <div class="alert alert-info">
        {!! session('info') !!}
    </div>
@endif
   <div class="form-container">
      <h2>Tambah Jenis Surat</h2>
      <form action="{{ route('jenis-surat.store') }}" method="POST" id="jenisSuratForm">
         @csrf

         <!-- Kode Surat -->
         <div class="mb-3">
            <label for="kode" class="form-label">Kode Surat</label>
            <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan kode surat (misal: SK01)" required>
         </div>

         <!-- Nama Jenis Surat -->
         <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama Jenis Surat</label>
            <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" placeholder="Masukkan nama jenis surat" required>
         </div>

         <!-- Syarat Surat -->
         <div class="mb-3">
            <label for="syarat_json" class="form-label">Syarat Surat</label>
            <textarea name="syarat_json" id="syarat_json" rows="3" class="form-control" placeholder="Masukkan syarat surat (pisahkan dengan koma, misal: Fotokopi KTP, KK, Surat Pengantar RT)" required></textarea>
            <small class="text-muted">*Syarat dapat diisi dalam format teks biasa, sistem akan menyimpannya dalam bentuk JSON.</small>
         </div>

         <!-- Tombol Simpan -->
         <div class="d-grid">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
         </div>
      </form>
   </div>

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Validasi ringan -->
   <script>
      document.getElementById('jenisSuratForm').addEventListener('submit', function(e) {
         const kode = document.getElementById('kode').value.trim();
         const nama = document.getElementById('nama_jenis').value.trim();
         const syarat = document.getElementById('syarat_json').value.trim();

         if (!kode || !nama || !syarat) {
            e.preventDefault();
            alert('Harap isi semua kolom sebelum menyimpan!');
         }
      });
   </script>
</body>
</html>
