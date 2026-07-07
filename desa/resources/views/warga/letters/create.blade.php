<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Surat Mandiri</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white p-6">
    <h1 class="text-xl font-bold mb-4">Ajukan Surat Mandiri</h1>

    @if (session('success'))
        <div class="bg-green-100 p-3 mb-3">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('warga.letters.store') }}">
        @csrf

        <div class="mb-3">
            <label class="block mb-1">Jenis Surat</label>
            <select name="jenis_surat" class="border rounded p-2 w-full" required>
                <option value="" disabled selected>Pilih jenis surat</option>
                @foreach ($templates as $t)
                    {{-- value tetap `jenis_surat` agar pemrosesan & template lookup tetap bekerja.
                         Tampilan berupa judul/kategori yang lebih mudah dipahami warga. --}}
                    <option value="{{ $t->jenis_surat }}">{{ $t->name }} ({{ $t->jenis_surat }})</option>
                @endforeach
            </select>
        </div>

        {{-- MVP: input data pengajuan sebagai JSON sederhana.
             Untuk implementasi lengkap: buat form field dinamis sesuai template.
        --}}
        <div class="mb-3">
            <label class="block mb-1">Isi Data (JSON)</label>
            <textarea name="isi_data_json" class="border rounded p-2 w-full" rows="6" required placeholder='{"nama": "...", "keperluan": "..."}'></textarea>
            @error('isi_data_json')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="bg-black text-white px-4 py-2 rounded" type="submit">Kirim Pengajuan</button>
    </form>
</body>
</html>

