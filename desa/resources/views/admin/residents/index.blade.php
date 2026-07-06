<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Warga</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <h1>Manajemen Warga</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div style="margin: 12px 0;">
            <a class="btn btn-primary" href="{{ route('admin.residents.create') }}">+ Tambah Warga</a>
        </div>

        <table class="table" border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Warga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($residents as $i => $resident)
                <tr>
                    <td>{{ $residents->firstItem() + $i }}</td>
                    <td>{{ $resident->nik }}</td>
                    <td>{{ $resident->nama_lengkap }}</td>
                    <td>{{ $resident->jenis_kelamin }}</td>
                    <td>{{ $resident->status_warga }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.residents.edit', $resident) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.residents.destroy', $resident) }}" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $residents->links() }}
        </div>
    </div>
</body>
</html>

