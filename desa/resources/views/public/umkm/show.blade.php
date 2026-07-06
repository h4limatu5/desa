<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-5xl mx-auto p-6">
        <article>
            <h1 class="text-3xl font-bold mb-4">{{ $umkm->name }}</h1>
            <p class="text-gray-600 mb-3">Kategori: {{ $umkm->category }}</p>
            <p class="text-gray-600 mb-3">Pemilik: {{ $umkm->owner }}</p>
            <p class="text-gray-600 mb-3">Telepon: {{ $umkm->phone }}</p>
            <p class="text-gray-600 mb-3">Alamat: {{ $umkm->address }}</p>
            <div class="prose prose-lg">{!! nl2br(e($umkm->description)) !!}</div>
        </article>
    </div>
</body>
</html>
