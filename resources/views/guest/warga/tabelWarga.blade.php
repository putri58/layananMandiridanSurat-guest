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
         background-color: #f8f9fa;
         font-family: 'Poppins', sans-serif;
      }

      .navbar {
         background: #fff;
         box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }

      .table-container {
         background: #fff;
         padding: 40px 50px;
         border-radius: 15px;
         box-shadow: 0 4px 20px rgba(0,0,0,0.1);
         margin: 60px auto;
         max-width: 95%;
      }

      h2 {
         text-align: center;
         color: #007bff;
         font-weight: 700;
         margin-bottom: 30px;
      }

      thead {
         background-color: #007bff;
         color: white;
      }

      tbody tr:hover {
         background-color: #f1f1f1;
      }

      .btn-primary {
         background-color: #007bff;
         border: none;
      }

      .btn-primary:hover {
         background-color: #0056b3;
      }
   </style>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
         <a class="navbar-brand fw-bold text-uppercase text-dark" href="#">Layanan Mandiri</a>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link active fw-semibold text-primary" href="{{ route('warga.index') }}">Data Warga</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('jenis-surat.index') }}">Jenis Surat</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Tabel Data Warga -->
   <div class="table-container">
      <h2>Daftar Data Warga</h2>

      <div class="table-responsive">
         <table class="table table-bordered table-striped align-middle text-center">
            <thead>
               <tr>
                  <th>No</th>
                  <th>No KTP</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Agama</th>
                  <th>Pekerjaan</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($warga as $item)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->no_ktp }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->gender }}</td>
                  <td>{{ $item->agama }}</td>
                  <td>{{ $item->pekerjaan }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>
                     <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-sm btn-warning">Edit</a>
                     <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                     </form>
                  </td>
               </tr>
               <tr>
                  <td colspan="8" class="text-center text-muted">Belum ada data warga.</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <div class="text-end mt-3">
         <a href="{{ route('warga.create') }}" class="btn btn-primary">+ Tambah Warga</a>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
