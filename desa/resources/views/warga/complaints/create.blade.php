<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Laporkan Pengaduan</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('warga.complaints.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="border rounded p-2 w-full" />
            </div>

            <div class="mb-4">
                <label class="block mb-1">Kategori</label>
                <input type="text" name="category" value="{{ old('category') }}" class="border rounded p-2 w-full" />
            </div>

            <div class="mb-4">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="description" rows="6" required class="border rounded p-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Foto (opsional)</label>
                <input type="file" name="photo" accept="image/*" class="w-full" />
            </div>

            <button type="submit" class="bg-black text-white px-4 py-2 rounded">Kirim Pengaduan</button>
        </form>
    </div>
</body>
</html>
