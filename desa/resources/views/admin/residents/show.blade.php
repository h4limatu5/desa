<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Detail Warga</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <h1>Detail Warga</h1>

        <div class="card" style="padding: 16px; border:1px solid #ddd; border-radius:8px;">
            <p><b>NIK:</b> {{ $resident->nik }}</p>
            <p><b>Nama:</b> {{ $resident->nama_lengkap }}</p>
            <p><b>Jenis Kelamin:</b> {{ $resident->jenis_kelamin }}</p>
            <p><b>Status Warga:</b> {{ $resident->status_warga }}</p>
            <p><b>Tanggal Lahir:</b> {{ optional($resident->tanggal_lahir)->format('Y-m-d') }}</p>
            <p><b>Alamat:</b> {{ $resident->alamat }}</p>
        </div>

        <div style="margin-top: 12px;">
            <a class="btn btn-secondary" href="{{ route('admin.residents.index') }}">Kembali</a>
            <a class="btn btn-warning" href="{{ route('admin.residents.edit', $resident) }}">Edit</a>
        </div>
    </div>
</body>
</html>

