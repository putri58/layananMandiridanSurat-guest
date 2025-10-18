<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Berhasil!</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

   <style>
      body {
         background: linear-gradient(135deg, #007bff, #66b2ff);
         font-family: 'Poppins', sans-serif;
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         color: #fff;
         overflow: hidden;
      }

      .card {
         background: #ffffff;
         color: #333;
         border-radius: 20px;
         box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
         padding: 40px;
         text-align: center;
         max-width: 450px;
         animation: fadeIn 0.7s ease;
      }

      h2 {
         color: #007bff;
         font-weight: 700;
         margin-bottom: 20px;
      }

      p {
         font-size: 16px;
         color: #555;
         margin-bottom: 30px;
      }

      .btn-primary {
         background-color: #007bff;
         border: none;
         padding: 10px 25px;
         font-weight: 600;
         border-radius: 10px;
         transition: all 0.3s ease;
      }

      .btn-primary:hover {
         background-color: #0056b3;
         transform: scale(1.05);
      }

      @keyframes fadeIn {
         from { opacity: 0; transform: translateY(30px); }
         to { opacity: 1; transform: translateY(0); }
      }
   </style>
</head>

<body>
   <div class="card">
      <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" width="80" class="mb-3" alt="Success">
      <h2>Berhasil Disimpan!</h2>
      <p>Data kamu telah berhasil disimpan ke dalam sistem 🎉</p>

      <a href="{{ route('jenis-surat.create') }}" class="btn btn-primary">Kembali ke Form</a>
   </div>

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
