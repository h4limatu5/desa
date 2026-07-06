@extends('admin.layout')

@section('title', 'Detail Warga')

@section('content')
    <div class="page-header">
        <div>
            <h1>Detail Warga</h1>
            <p class="text-muted">Informasi lengkap warga berdasarkan NIK.</p>
        </div>
        <div>
            <a href="{{ route('admin.residents.edit', $resident) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.residents.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card p-6">
        <p><strong>NIK:</strong> {{ $resident->nik }}</p>
        <p><strong>Nama:</strong> {{ $resident->nama_lengkap }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $resident->jenis_kelamin }}</p>
        <p><strong>Status Warga:</strong> {{ $resident->status_warga }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ optional($resident->tanggal_lahir)->format('Y-m-d') }}</p>
        <p><strong>Alamat:</strong> {{ $resident->alamat }}</p>
    </div>
@endsection

