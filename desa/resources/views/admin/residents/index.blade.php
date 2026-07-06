@extends('admin.layout')

@section('title', 'Manajemen Warga')

@section('content')
    <div class="page-header">
        <div>
            <h1>Manajemen Warga</h1>
            <p class="text-muted">CRUD data warga dan statistik kependudukan.</p>
        </div>
        <a href="{{ route('admin.residents.create') }}" class="btn btn-primary">+ Tambah Warga</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-6">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Warga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($residents as $i => $resident)
                <tr>
                    <td>{{ $residents->firstItem() + $i }}</td>
                    <td>{{ $resident->nik }}</td>
                    <td>{{ $resident->nama_lengkap }}</td>
                    <td>{{ $resident->jenis_kelamin }}</td>
                    <td>{{ $resident->status_warga }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('admin.residents.edit', $resident) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.residents.destroy', $resident) }}" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data warga.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $residents->links() }}</div>
    </div>
@endsection

