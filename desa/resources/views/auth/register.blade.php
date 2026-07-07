@extends('auth.layout_auth')

@php
    $brandTitle = 'Desa Portal';
    $brandSubtitle = 'Buat akun untuk mengakses manajemen desa, pengaduan, dan surat resmi.';
@endphp

@section('title', 'Register')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="mb-4">
            <label for="nik">NIK</label>
            <input id="nik" type="text" name="nik" value="{{ old('nik') }}" required class="auth-input" maxlength="16" />
        </div>

        <div class="mb-4">
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required class="auth-input" />
        </div>

        <div class="mb-4">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="auth-input" />
        </div>


        <div class="mb-4">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required class="auth-input" />
        </div>

        <div class="mb-6">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="auth-input" />
        </div>

        <button type="submit" class="auth-button">Daftar</button>
    </form>

    <div class="auth-footer">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
@endsection

