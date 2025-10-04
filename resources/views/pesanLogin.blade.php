<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a8dadc, #fdfd96, #bde0c8);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-container {
            background: #ffffffcc;
            backdrop-filter: blur(6px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 6px 12px rgba(0,0,0,0.15);
            text-align: center;
            width: 500px;
        }

        h1 {
            color: #1d3557;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #e9fcd4;
            color: #2b9348;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #95d5b2;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #74c69d;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Selamat Datang di Dashboard 🎉</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/auth" class="btn">Logout</a>
    </div>
</body>
</html>
