<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Tambah Warga</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Warga</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.residents.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input class="form-control" name="nik" value="{{ old('nik') }}" required maxlength="16">
            </div>

            <div class="mb-3">
                <label class="form-label">KK</label>
                <input class="form-control" name="kk" value="{{ old('kk') }}" maxlength="16">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required maxlength="255">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="">-- pilih --</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin')==='Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin')==='Perempuan')>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}" maxlength="255">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input class="form-control" name="alamat" value="{{ old('alamat') }}" maxlength="255">
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label">RT</label>
                    <input class="form-control" name="rt" value="{{ old('rt') }}" maxlength="10">
                </div>
                <div class="mb-3 col">
                    <label class="form-label">RW</label>
                    <input class="form-control" name="rw" value="{{ old('rw') }}" maxlength="10">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Desa</label>
                <input class="form-control" name="desa" value="{{ old('desa') }}" maxlength="255">
            </div>

            <div class="mb-3">
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

            <div class="mb-3">
                <label class="form-label">Status Warga</label>
                <select class="form-control" name="status_warga">
                    <option value="Aktif" @selected(old('status_warga')==='Aktif' || old('status_warga')===null)>Aktif</option>
                    <option value="Nonaktif" @selected(old('status_warga')==='Nonaktif')>Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-success" type="submit">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('admin.residents.index') }}">Kembali</a>
        </form>
    </div>
</body>
</html>

