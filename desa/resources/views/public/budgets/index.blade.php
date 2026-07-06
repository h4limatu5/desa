<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APBDes Desa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css">
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <header class="mb-8">
            <a href="{{ route('public.home') }}" class="text-sm text-slate-600 hover:text-slate-900">&larr; Kembali ke Beranda</a>
            <h1 class="text-4xl font-bold mt-3">APBDes Desa</h1>
            <p class="text-slate-600 mt-2">Transparansi anggaran desa dan realisasi pembangunan.</p>
        </header>

        <div class="grid gap-6 lg:grid-cols-3 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Total Anggaran</h2>
                <p class="text-3xl font-bold text-slate-900">Rp {{ number_format($totalBudget ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Total Realisasi</h2>
                <p class="text-3xl font-bold text-slate-900">Rp {{ number_format($totalActual ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Sisa Anggaran</h2>
                <p class="text-3xl font-bold text-slate-900">Rp {{ number_format(($totalBudget ?? 0) - ($totalActual ?? 0), 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="space-y-4">
            @forelse($budgets as $budget)
                <article class="bg-white rounded-3xl p-6 shadow-sm">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold">{{ $budget->category }} {{ $budget->year ? '('.$budget->year.')' : '' }}</h3>
                        </div>
                        <div class="text-right">
                            <p class="text-slate-500">Anggaran: Rp {{ number_format($budget->allocated, 0, ',', '.') }}</p>
                            <p class="text-slate-500">Realisasi: Rp {{ number_format($budget->spent, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <p class="mt-4 text-slate-600">{{ $budget->description }}</p>
                </article>
            @empty
                <div class="rounded-3xl bg-white p-8 text-center shadow-sm">
                    <p class="text-slate-700">Belum ada data APBDes saat ini. Silakan hubungi perangkat desa untuk informasi terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
