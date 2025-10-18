<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Warga</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #6fb1fc, #4364f7, #3f51b5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 600px;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00b4db);
            border-bottom: none;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            transition: 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        label {
            font-weight: 500;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header text-white text-center">
            <h4>Form Input Data Warga</h4>
        </div>
        @if (session('info'))
    <div class="alert alert-info">
        {!! session('info') !!}
    </div>
@endif
        <div class="card-body">
            <form action="{{ route('warga.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="no_ktp">No KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan No KTP" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Male">Laki-laki</option>
                        <option value="Female">Perempuan</option>
                        <option value="Other">Lainnya</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan Agama" required>
                </div>

                <div class="form-group mb-3">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone">No HP</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor HP">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-4 me-2">Simpan Data</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional JS (Alert Kirim Data) -->
    <script>
        document.querySelector("form").addEventListener("submit", function () {
            alert("Data warga berhasil dikirim!");
        });
    </script>
</body>
</html>
