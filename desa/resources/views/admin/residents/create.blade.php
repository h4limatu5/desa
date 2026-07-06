@extends('admin.layout')

@section('title', 'Tambah Warga')

@section('content')
    <div class="page-header">
        <div>
            <h1>Tambah Warga</h1>
            <p class="text-muted">Masukkan data warga baru dengan lengkap.</p>
        </div>
        <a href="{{ route('admin.residents.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-6">
        <form method="POST" action="{{ route('admin.residents.store') }}" class="grid gap-6">
            @csrf

            <div>
                <label class="form-label">NIK</label>
                <input class="form-control" name="nik" value="{{ old('nik') }}" required maxlength="16">
            </div>

            <div>
                <label class="form-label">KK</label>
                <input class="form-control" name="kk" value="{{ old('kk') }}" maxlength="16">
            </div>

            <div>
                <label class="form-label">Nama Lengkap</label>
                <input class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required maxlength="255">
            </div>

            <div>
                <label class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>

            <div>
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="">-- pilih --</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin')==='Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin')==='Perempuan')>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="form-label">Nomor HP</label>
                <input class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}" maxlength="255">
            </div>

            <div>
                <label class="form-label">Alamat</label>
                <input class="form-control" name="alamat" value="{{ old('alamat') }}" maxlength="255">
            </div>

            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
                <div>
                    <label class="form-label">RT</label>
                    <input class="form-control" name="rt" value="{{ old('rt') }}" maxlength="10">
                </div>
                <div>
                    <label class="form-label">RW</label>
                    <input class="form-control" name="rw" value="{{ old('rw') }}" maxlength="10">
                </div>
            </div>

            <div>
                <label class="form-label">Desa</label>
                <input class="form-control" name="desa" value="{{ old('desa') }}" maxlength="255">
            </div>

            <div>
                <label class="form-label">Status Perkawinan</label>
                <select class="form-control" name="status_perkawinan">
                    <option value="">-- pilih --</option>
                    <option value="Belum Kawin" @selected(old('status_perkawinan')==='Belum Kawin')>Belum Kawin</option>
                    <option value="Kawin" @selected(old('status_perkawinan')==='Kawin')>Kawin</option>
                    <option value="Cerai" @selected(old('status_perkawinan')==='Cerai')>Cerai</option>
                    <option value="Cerai Mati" @selected(old('status_perkawinan')==='Cerai Mati')>Cerai Mati</option>
                    <option value="Lainnya" @selected(old('status_perkawinan')==='Lainnya')>Lainnya</option>
                </select>
            </div>

            <div>
                <label class="form-label">Status Warga</label>
                <select class="form-control" name="status_warga">
                    <option value="Aktif" @selected(old('status_warga')==='Aktif' || old('status_warga')===null)>Aktif</option>
                    <option value="Nonaktif" @selected(old('status_warga')==='Nonaktif')>Nonaktif</option>
                </select>
            </div>

            <div class="grid" style="grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem;">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('admin.residents.index') }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection

