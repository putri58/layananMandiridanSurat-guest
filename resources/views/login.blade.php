<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a8dadc, #fdfd96, #bde0c8); /* biru pastel, kuning soft, hijau pastel */
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #ffffffcc;
            backdrop-filter: blur(6px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 6px 12px rgba(0,0,0,0.15);
            width: 320px;
            text-align: center;
        }

        h2 {
            color: #1d3557; /* biru lebih gelap */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background: #95d5b2; /* hijau pastel */
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #74c69d; /* hijau lebih gelap saat hover */
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .alert-error {
            background: #ffe5e5;
            color: #d90429;
        }

        .alert-success {
            background: #e9fcd4;
            color: #2b9348;
        }

        ul {
            text-align: left;
            padding-left: 20px;
            color: #d90429;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Form Login</h2>

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/auth/login" method="POST">
            @csrf
            <label>Username:</label>
            <input type="text" name="username" value="{{ old('username') }}">

            <label>Password:</label>
            <input type="password" name="password">

            <button type="submit">Login</button>
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
