<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - Desa</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #03111f;
            color: #e5eefc;
        }
        a { color: #cbd5f1; text-decoration: none; }
        a:hover { color: #ffffff; }
        .container { max-width: 1200px; margin: 0 auto; padding: 24px; }
        .card { background: #0d2344; border: 1px solid #1d3960; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,.24); }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: .75rem 1.2rem; border-radius: .75rem; font-weight: 600; transition: transform .15s ease, background .15s ease; }
        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: #1e3a8a; color: white; }
        .btn-secondary { background: #223455; color: #cbd5f1; }
        .btn-warning { background: #2563eb; color: white; }
        .btn-danger { background: #dc2626; color: white; }
        .text-muted { color: #94a3b8; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #1f3256; padding: 12px 14px; }
        .table th { background: #0b2340; text-align: left; }
        .form-control, .form-label, select, textarea, input { width: 100%; color: #f8fafc; background: #071826; border: 1px solid #1d3b63; border-radius: .75rem; padding: .75rem 1rem; }
        .form-control:focus, select:focus, textarea:focus, input:focus { outline: 2px solid #2563eb; }
        .alert { padding: 1rem 1.2rem; border-radius: 1rem; margin-bottom: 1rem; }
        .alert-success { background: #0f3d65; color: #d1fae5; border: 1px solid #164e82; }
        .grid { display: grid; gap: 1.5rem; }
        .grid-3 { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
        .page-header { margin-bottom: 1.5rem; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; }
        .page-header h1 { margin: 0; font-size: 2rem; }
        .footer { background: #071825; color: #94a3b8; padding: 1rem 0; text-align: center; }
        .topnav { background: #06142a; border-bottom: 1px solid #152d52; }
        .topnav .nav-inner { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; padding: 1rem 24px; }
        .topnav a { color: #cbd5f1; margin-right: 0.75rem; }
        .topnav a.active, .topnav a:hover { color: #fff; }
        .badge { display: inline-flex; padding: .25rem .65rem; border-radius: 999px; background: #1d3a75; color: #e2e8f0; font-size: .85rem; }
    </style>
</head>
<body>
    <div class="topnav">
        <div class="nav-inner container">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="font-semibold text-white">Desa Admin</a>
            </div>
            <div class="flex items-center gap-2">
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
