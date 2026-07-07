<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Desa Portal') - Desa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    {{-- Navbar Publik --}}
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <a href="{{ route('public.home') }}" class="logo">
                    <span class="logo-icon">🏘️</span>
                    <span class="logo-text">Desa Portal</span>
                </a>
            </div>
            <div class="navbar-menu">
                <a href="{{ route('public.news.index') }}" class="nav-link">Berita Desa</a>
                <a href="{{ route('public.umkm.index') }}" class="nav-link">UMKM Lokal</a>
                <a href="{{ route('public.budgets.index') }}" class="nav-link">Transparansi APB</a>

                @auth
                    <a href="{{ route('warga.dashboard') }}" class="nav-link btn-nav">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link btn-nav">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="page-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer Publik --}}
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Tentang Kami</h3>
                <p>Portal Desa adalah platform digital untuk akses mudah layanan dan informasi desa.</p>
            </div>
            <div class="footer-section">
                <h3>Menu Utama</h3>
                <ul>
                    <li><a href="{{ route('public.news.index') }}">Berita Desa</a></li>
                    <li><a href="{{ route('public.umkm.index') }}">UMKM Lokal</a></li>
                    <li><a href="{{ route('public.budgets.index') }}">Transparansi APB</a></li>
                    <li>
                        @auth
                            <a href="{{ route('warga.dashboard') }}">Dashboard Warga</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Layanan</h3>
                <ul>
                    <li>
                        @auth
                            <a href="{{ route('warga.letters.create') }}">Surat Mandiri</a>
                        @else
                            <a href="{{ route('login') }}">Surat Mandiri</a>
                        @endauth
                    </li>
                    <li>
                        @auth
                            <a href="{{ route('warga.complaints.create') }}">E-Reporting</a>
                        @else
                            <a href="{{ route('login') }}">E-Reporting</a>
                        @endauth
                    </li>
                    <li><a href="{{ route('public.umkm.index') }}">Katalog UMKM</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Desa Portal. Semua Hak Dilindungi. | Dikembangkan dengan <span class="heart">❤️</span> untuk masyarakat desa</p>
        </div>
    </footer>
</body>
</html>

