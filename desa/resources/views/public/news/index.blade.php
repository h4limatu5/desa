<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Desa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Berita Desa</h1>
        <div class="space-y-6">
            @foreach ($news as $item)
                <article class="border rounded-lg p-4 shadow-sm">
                    <h2 class="text-2xl font-semibold mb-2">{{ $item->title }}</h2>
                    <p class="text-gray-600 mb-3">{{ $item->excerpt }}</p>
                    <a href="{{ route('public.news.show', $item) }}" class="text-blue-600">Baca selengkapnya</a>
                </article>
            @endforeach
        </div>
        <div class="mt-6">{{ $news->links() }}</div>
    </div>
</body>
</html>
