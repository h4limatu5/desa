<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - Desa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="admin-body">
    <div class="admin-topnav">
        <div class="nav-inner container">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="font-semibold text-white">Desa Admin</a>
            </div>
            <div class="admin-button-group">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.residents.index') }}">Warga</a>
                <a href="{{ route('admin.complaints.index') }}">Pengaduan</a>
                <a href="{{ route('admin.letters.index') }}">Surat</a>
            </div>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        © {{ date('Y') }} Desa Portal. All rights reserved.
    </footer>
</body>
</html>
