<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa | Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-6xl mx-auto p-6">
        <header class="mb-10">
            <h1 class="text-3xl font-bold">Profil & Berita Desa</h1>
            <p class="text-gray-600 mt-2">Informasi struktur organisasi, visi-misi, sejarah, kegiatan, dan berita desa terbaru.</p>
        </header>

        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-3">Berita Terbaru</h2>
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ($news as $item)
                    <article class="border rounded-lg p-4 shadow-sm">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-3">{{ $item->excerpt }}</p>
                        <a href="{{ route('public.news.show', $item) }}" class="text-blue-600">Baca selengkapnya</a>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-3">Katalog UMKM & Potensi Desa</h2>
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ($umkms as $item)
                    <article class="border rounded-lg p-4 shadow-sm">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->name }}</h3>
                        <p class="text-gray-600 mb-2">{{ $item->category }}</p>
                        <p class="text-gray-600 mb-3">{{ Str::limit($item->description, 100) }}</p>
                        <a href="{{ route('public.umkm.show', $item) }}" class="text-blue-600">Lihat detail</a>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-2">
            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-2xl font-semibold mb-3">Layanan Surat Mandiri</h2>
                <p class="text-gray-600 mb-4">Warga bisa login, ajukan surat, dan cek status verifikasi.</p>
                <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">Masuk / Ajukan Surat</a>
            </div>

            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-2xl font-semibold mb-3">E-Reporting</h2>
                <p class="text-gray-600">Laporkan fasilitas publik rusak langsung dengan foto.</p>
                <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">Login untuk lapor</a>
            </div>
        </section>

        <section class="mt-10 border rounded-lg p-6 shadow-sm bg-gray-50">
            <h2 class="text-2xl font-semibold mb-3">Transparansi Keuangan APBDes</h2>
            <p class="text-gray-600 mb-4">Lihat ringkasan anggaran desa dan realisasi pembangunan secara transparan.</p>
            <a href="{{ route('public.budgets.index') }}" class="text-blue-600">Lihat APBDes</a>
        </section>
    </div>
</body>
</html>
