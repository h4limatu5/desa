<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Desa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Katalog UMKM Desa</h1>
        <div class="grid gap-6 lg:grid-cols-3">
            @foreach ($umkms as $item)
                <article class="border rounded-lg p-4 shadow-sm">
                    <h2 class="text-xl font-semibold mb-2">{{ $item->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ $item->category }}</p>
                    <p class="text-gray-600 mb-3">{{ Str::limit($item->description, 100) }}</p>
                    <a href="{{ route('public.umkm.show', $item) }}" class="text-blue-600">Detail</a>
                </article>
            @endforeach
        </div>
        <div class="mt-6">{{ $umkms->links() }}</div>
    </div>
</body>
</html>
