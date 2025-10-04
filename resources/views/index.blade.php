<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berkas - Guest</title>
</head>
<body style="background-color:#ffeef4; font-family:Arial, sans-serif; padding:20px;">

    <h2 style="text-align:center; color:#d63384;">👤 Guest - Daftar Berkas Persyaratan</h2>

    <table border="1" cellspacing="0" cellpadding="8" style="width:100%; background:white; margin-top:20px;">
        <tr style="background-color:#ffd6e8;">
            <th>#</th>
            <th>Nama Berkas</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($berkas as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->nama_berkas }}</td>
            <td>{{ $b->deskripsi }}</td>
        </tr>
        @endforeach
    </table>

    <p style="text-align:center; margin-top:20px;">
        <a href="/" style="background:#d63384; color:white; padding:8px 16px; text-decoration:none; border-radius:5px;">
            ⬅ Kembali
        </a>
    </p>

</body>
</html>