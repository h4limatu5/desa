@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="page-header">
        <div>
            <h1>Dashboard Admin</h1>
            <p class="text-muted">Ringkasan kependudukan, surat, dan pengaduan.</p>
        </div>
        <div>
            <a href="{{ route('admin.residents.index') }}" class="btn btn-secondary">Manajemen Warga</a>
        </div>
    </div>

    <div class="grid grid-3">
        <div class="card p-6">
            <h2>Total Warga</h2>
            <p class="text-3xl font-bold">{{ $stats['total_residents'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Warga Aktif</h2>
            <p class="text-3xl font-bold">{{ $stats['active_residents'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Warga Nonaktif</h2>
            <p class="text-3xl font-bold">{{ $stats['inactive_residents'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Surat Menunggu</h2>
            <p class="text-3xl font-bold">{{ $stats['pending_letters'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Surat Disetujui</h2>
            <p class="text-3xl font-bold">{{ $stats['approved_letters'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Pengaduan Menunggu</h2>
            <p class="text-3xl font-bold">{{ $stats['pending_complaints'] }}</p>
        </div>
        <div class="card p-6">
            <h2>Pengaduan Terselesaikan</h2>
            <p class="text-3xl font-bold">{{ $stats['resolved_complaints'] }}</p>
        </div>
    </div>

    <section class="mt-8">
        <div class="page-header">
            <div>
                <h2>Pengaduan Terbaru</h2>
            </div>
            <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">Lihat Semua Pengaduan</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($recentComplaints as $complaint)
                <tr>
                    <td>{{ $complaint->id }}</td>
                    <td>{{ $complaint->title }}</td>
                    <td>{{ $complaint->status }}</td>
                    <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                    <td><a href="{{ route('admin.complaints.show', $complaint) }}">Detail</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada pengaduan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>
@endsection
