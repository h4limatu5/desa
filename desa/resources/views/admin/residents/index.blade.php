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
        <form method="GET" action="{{ route('admin.residents.index') }}" class="mb-4">
            <div class="grid" style="grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 12px;">
                <div>
                    <label class="form-label">Cari NIK</label>
                    <input class="form-control" name="nik" value="{{ request('nik') }}" placeholder="NIK" />
                </div>
                <div>
                    <label class="form-label">Cari Nama</label>
                    <input class="form-control" name="nama" value="{{ request('nama') }}" placeholder="Nama" />
                </div>
                <div>
                    <label class="form-label">RT</label>
                    <input class="form-control" name="rt" value="{{ request('rt') }}" placeholder="RT" />
                </div>
                <div>
                    <label class="form-label">RW</label>
                    <input class="form-control" name="rw" value="{{ request('rw') }}" placeholder="RW" />
                </div>
                <div>
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="">-- semua --</option>
                        <option value="Laki-laki" @selected(request('jenis_kelamin')==='Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(request('jenis_kelamin')==='Perempuan')>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="grid" style="grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; margin-top: 12px;">
                <div>
                    <label class="form-label">Status Warga</label>
                    <select class="form-control" name="status_warga">
                        <option value="">-- semua --</option>
                        <option value="Aktif" @selected(request('status_warga')==='Aktif')>Aktif</option>
                        <option value="Nonaktif" @selected(request('status_warga')==='Nonaktif')>Nonaktif</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">KK (opsional)</label>
                    <input class="form-control" name="kk" value="{{ request('kk') }}" placeholder="KK" />
                </div>
                <div class="d-flex align-items-end" style="gap: 10px;">
                    <button class="btn btn-primary" type="submit">Terapkan</button>
                    <a class="btn btn-secondary" href="{{ route('admin.residents.index') }}">Reset</a>
                </div>
            </div>
        </form>

        <div class="mt-3 mb-4">
            <div class="grid" style="grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 12px;">
                <div class="card p-3">
                    <div class="text-sm text-muted">Total Warga</div>
                    <div class="text-xl font-bold">{{ $stats['total'] ?? 0 }}</div>
                </div>
                <div class="card p-3">
                    <div class="text-sm text-muted">Aktif</div>
                    <div class="text-xl font-bold">{{ $stats['active'] ?? 0 }}</div>
                </div>
                <div class="card p-3">
                    <div class="text-sm text-muted">Nonaktif</div>
                    <div class="text-xl font-bold">{{ $stats['inactive'] ?? 0 }}</div>
                </div>
                <div class="card p-3">
                    <div class="text-sm text-muted">Laki-laki</div>
                    <div class="text-xl font-bold">{{ $stats['male'] ?? 0 }}</div>
                </div>
                <div class="card p-3">
                    <div class="text-sm text-muted">Perempuan</div>
                    <div class="text-xl font-bold">{{ $stats['female'] ?? 0 }}</div>
                </div>
            </div>
        </div>

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
                        <form method="POST" action="{{ route('admin.residents.destroy', $resident) }}" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
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

