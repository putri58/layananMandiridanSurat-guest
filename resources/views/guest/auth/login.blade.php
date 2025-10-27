<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* === Variabel Warna Navy-Red === */
        :root {
            --navy: #001f3f; /* Biru tua */
            --red: #b30000;
            --light-gray: #f5f6fa;
            --accent-navy: #003366; /* Navy yang sedikit lebih terang */
            --accent-red: #d90404; /* Merah lebih gelap */
        }

        /* === Latar Belakang Utama (Navy) === */
        body {
            font-family: Arial, sans-serif;
            background-color: var(--navy); /* Menggunakan warna Navy */
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* === Kontainer Login (Putih Menonjol) === */
        .login-container {
            background: #fff;
            padding: 40px; /* Padding diperbesar */
            border-radius: 18px; /* Lebih bulat */
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3); /* Shadow lebih kuat */
            width: 350px; /* Lebih lebar */
            text-align: center;
            border: 3px solid var(--accent-navy); /* Outline Navy */
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            color: var(--navy); /* Judul menggunakan Navy */
            margin-bottom: 30px;
            font-size: 1.8rem;
            font-weight: 700;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: var(--accent-navy); /* Label menggunakan Accent Navy */
            font-weight: bold;
            text-align: left;
            font-size: 0.95rem;
        }

        input {
            width: 90%;
            padding: 12px 15px; /* Padding lebih besar */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px; /* Lebih bulat */
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Interaktif: Input Focus */
        input:focus {
            outline: none;
            border-color: var(--navy);
            box-shadow: 0 0 0 0.2rem rgba(0, 31, 63, 0.2);
            background-color: var(--light-gray);
        }

        /* === Tombol Login (Merah) === */
        button {
            background: var(--red); /* Warna aksi utama: Merah */
            color: #fff;
            font-weight: 700;
            border: none;
            padding: 15px; /* Padding tombol lebih besar */
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        button:hover {
            background: var(--accent-red); /* Merah lebih gelap saat hover */
            transform: translateY(-2px); /* Efek terangkat */
            box-shadow: 0 6px 12px rgba(179, 0, 0, 0.4);
        }

        /* === Alert dan Error Messages === */
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 15px;
            font-weight: 600;
        }

        .alert-error {
            background: #ffe0e0; /* Merah muda soft */
            color: var(--red);
            border: 1px solid var(--red);
        }

        .alert-success {
            background: #e0fff3; /* Hijau muda soft */
            color: var(--accent-navy);
            border: 1px solid var(--accent-navy);
        }

        ul {
            text-align: left;
            padding-left: 20px;
            color: var(--red); /* Error list menggunakan Merah */
            font-size: 14px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN PENGGUNA</h2>

        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        <form action="/auth/login" method="POST">
            @csrf

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password Anda">

            <button type="submit">LOGIN</button>
        </form>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
