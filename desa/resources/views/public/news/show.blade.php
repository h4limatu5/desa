<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-5xl mx-auto p-6">
        <article>
            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
            <p class="text-gray-500 mb-6">{{ $news->published_at?->format('d M Y') }} | {{ $news->author }}</p>
            <div class="prose prose-lg">{!! nl2br(e($news->body)) !!}</div>
        </article>
    </div>
</body>
</html>
