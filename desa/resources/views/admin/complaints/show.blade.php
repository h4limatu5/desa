@extends('admin.layout')

@section('title', 'Detail Pengaduan')

@section('content')
    <div class="page-header">
        <div>
            <h1>Detail Pengaduan</h1>
            <p class="text-muted">Lihat detail laporan dan ubah status secara cepat.</p>
        </div>
        <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-6 mb-6">
        <p><strong>Judul:</strong> {{ $complaint->title }}</p>
        <p><strong>Pengirim:</strong> {{ optional($complaint->user)->name ?? 'Anonim' }}</p>
        <p><strong>Status:</strong> {{ $complaint->status }}</p>
        <p><strong>Kategori:</strong> {{ $complaint->category ?? '-' }}</p>
        <p><strong>Dibuat:</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}</p>
        <div class="mt-4">
            <strong>Deskripsi:</strong>
            <p>{{ $complaint->description }}</p>
        </div>
        @if($complaint->photo_path)
            <div class="mt-4">
                <strong>Foto:</strong>
                <div><a href="{{ asset('storage/' . $complaint->photo_path) }}" target="_blank">Lihat foto</a></div>
            </div>
        @endif
    </div>

    <div class="card p-6">
        <form method="POST" action="{{ route('admin.complaints.update', $complaint) }}" class="grid gap-6">
            @csrf
            @method('PATCH')

            <div>
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="pending" @selected($complaint->status==='pending')>Pending</option>
                    <option value="in_progress" @selected($complaint->status==='in_progress')>In Progress</option>
                    <option value="resolved" @selected($complaint->status==='resolved')>Resolved</option>
                    <option value="rejected" @selected($complaint->status==='rejected')>Rejected</option>
                </select>
            </div>

            <div>
                <label class="form-label">Respon</label>
                <textarea name="response" class="form-control" rows="4">{{ old('response', $complaint->response) }}</textarea>
            </div>

            <div class="grid" style="grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem;">
                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                <a class="btn btn-secondary" href="{{ route('admin.complaints.index') }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection
