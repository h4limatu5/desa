<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="auth-page">
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-brand">
                <div class="auth-logo" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="6" y="22" width="36" height="18" rx="4" fill="#ffffff" fill-opacity="0.14"/>
                        <path d="M14 22V14L24 8L34 14V22" stroke="#eff6ff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 32V24H28V32" stroke="#eff6ff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 15L24 12L26 15" stroke="#eff6ff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <h1>{{ $brandTitle ?? 'Desa Portal' }}</h1>
                <p>{{ $brandSubtitle ?? 'Masuk untuk mengakses layanan desa.' }}</p>

                <div class="auth-links" aria-label="Navigasi login">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-link auth-link-primary">Dashboard</a>
                    @else
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="auth-link">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-link">Register</a>
                        @endif
                    @endauth
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="auth-separator" aria-hidden="true"></div>

            @yield('content')
        </div>
    </div>
</body>
</html>

