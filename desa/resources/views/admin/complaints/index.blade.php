@extends('admin.layout')

@section('title', 'Pengaduan')

@section('content')
    <div class="page-header">
        <div>
            <h1>Daftar Pengaduan</h1>
            <p class="text-muted">Kelola laporan masyarakat dan kirim respons resmi.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-6">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Pengirim</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($complaints as $complaint)
                    <tr>
                        <td>{{ $complaints->firstItem() + $loop->index }}</td>
                        <td>{{ $complaint->title }}</td>
                        <td>{{ optional($complaint->user)->name ?? 'Anonim' }}</td>
                        <td>{{ $complaint->status }}</td>
                        <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                        <td><a href="{{ route('admin.complaints.show', $complaint) }}">Lihat</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada pengaduan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $complaints->links() }}</div>
    </div>
@endsection
