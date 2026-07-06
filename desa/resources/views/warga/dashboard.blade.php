<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Warga</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white text-gray-900">
    <div class="max-w-6xl mx-auto p-6">
        <header class="mb-8">
            <h1 class="text-3xl font-bold">Dashboard Warga</h1>
            <p class="text-gray-600">Ringkasan layanan surat, pengaduan, berita, dan transparansi anggaran.</p>
        </header>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">{{ session('success') }}</div>
        @endif

        <div class="grid gap-6 lg:grid-cols-2 mb-8">
            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Surat Mandiri Terbaru</h2>
                <ul class="space-y-3">
                    @forelse ($letters as $letter)
                        <li class="border rounded p-3">
                            <div class="font-semibold">{{ $letter->jenis_surat }}</div>
                            <div class="text-sm text-gray-600">Status: {{ $letter->status }}</div>
                        </li>
                    @empty
                        <li class="text-gray-600">Belum ada pengajuan surat.</li>
                    @endforelse
                </ul>
            </div>

            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Pengaduan Terbaru</h2>
                <ul class="space-y-3">
                    @forelse ($complaints as $complaint)
                        <li class="border rounded p-3">
                            <div class="font-semibold">{{ $complaint->title }}</div>
                            <div class="text-sm text-gray-600">Status: {{ $complaint->status }}</div>
                        </li>
                    @empty
                        <li class="text-gray-600">Belum ada pengaduan.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2 mb-8">
            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Transparansi Anggaran (APBDes)</h2>
                <div class="space-y-4">
                    @foreach ($budgets as $budget)
                        <div>
                            <div class="font-semibold">{{ $budget->category }} ({{ $budget->year }})</div>
                            <div class="text-sm text-gray-600">Alokasi: Rp {{ number_format($budget->allocated, 0, ',', '.') }}</div>
                            <div class="text-sm text-gray-600">Realisasi: Rp {{ number_format($budget->spent, 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border rounded-lg p-6 shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Berita & UMKM</h2>
                <div class="space-y-4">
                    @foreach ($news as $item)
                        <div>
                            <a href="{{ route('public.news.show', $item) }}" class="font-semibold text-blue-600">{{ $item->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <a href="{{ route('warga.complaints.create') }}" class="bg-black text-white px-4 py-2 rounded">Laporkan Pengaduan</a>
    </div>
</body>
</html>
