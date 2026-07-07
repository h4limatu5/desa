@extends('warga.layout')

@section('title', 'Dashboard Warga')

@section('content')
    <div class="page-header admin-page-header">

        <div>
            <h1>Dashboard Warga</h1>
            <p class="text-muted">Ringkasan layanan surat, pengaduan, berita, dan transparansi anggaran.</p>
        </div>
        <div>
            <a href="{{ route('warga.complaints.create') }}" class="btn btn-primary">Laporkan Pengaduan</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-grid admin-grid-2 mb-8">
        <div class="card">
            <h2 class="text-xl font-semibold mb-3">Surat Mandiri Terbaru</h2>
            <ul class="space-y-3">
                @forelse ($letters as $letter)
                    <li class="border rounded p-3">
                        <div class="font-semibold">{{ $letter->jenis_surat }}</div>
                        <div class="text-sm text-gray-600">Status: {{ $letter->status }}</div>
                    </li>
                @empty
                    <li class="text-gray-600">Belum ada pengajuan surat.</li>
                @endforelse
            </ul>
        </div>

        <div class="card">
            <h2 class="text-xl font-semibold mb-3">Pengaduan Terbaru</h2>
            <ul class="space-y-3">
                @forelse ($complaints as $complaint)
                    <li class="border rounded p-3">
                        <div class="font-semibold">{{ $complaint->title }}</div>
                        <div class="text-sm text-gray-600">Status: {{ $complaint->status }}</div>
                    </li>
                @empty
                    <li class="text-gray-600">Belum ada pengaduan.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="admin-grid admin-grid-2 mb-8">
        <div class="card">
            <h2 class="text-xl font-semibold mb-3">Transparansi Anggaran (APBDes)</h2>
            <div class="space-y-4">
                @foreach ($budgets as $budget)
                    <div>
                        <div class="font-semibold">{{ $budget->category }} ({{ $budget->year }})</div>
                        <div class="text-sm text-gray-600">Alokasi: Rp {{ number_format($budget->allocated, 0, ',', '.') }}</div>
                        <div class="text-sm text-gray-600">Realisasi: Rp {{ number_format($budget->spent, 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card">
            <h2 class="text-xl font-semibold mb-3">Berita & UMKM</h2>
            <div class="space-y-4">
                @foreach ($news as $item)
                    <div>
                        <a href="{{ route('public.news.show', $item) }}" class="font-semibold text-blue-600">{{ $item->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

