@extends('auth.layout_auth')

@php
    $brandTitle = 'Desa Portal';
    $brandSubtitle = 'Masuk untuk mengelola layanan kependudukan, pengaduan, dan surat resmi desa Anda.';
@endphp

@section('title', 'Login')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="mb-4">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="auth-input" />
        </div>

        <div class="mb-6">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required class="auth-input" />
        </div>

        <button type="submit" class="auth-button">Login</button>
    </form>

    <div class="auth-footer">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
@endsection

