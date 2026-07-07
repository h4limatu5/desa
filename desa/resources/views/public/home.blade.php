@extends('public.layout_public')

@section('title', 'Beranda')

@section('content')
    <div class="home-hero">
        <h1>Desa Portal: Akses Cepat Layanan Desa</h1>
        <p>Jelajahi berita desa, UMKM lokal, ajukan surat mandiri, laporkan fasilitas publik, dan pantau transparansi APBDes secara mudah dalam satu portal.</p>
    </div>

    <section class="page-section">
        <div class="section-heading">Pilihan Layanan</div>
        <p class="section-subtitle">Pilih layanan yang Anda butuhkan dan lanjutkan dengan cepat melalui portal desa.</p>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="card-icon">📰</div>
                <h2>Profil & Berita Desa</h2>
                <p>Temukan informasi terbaru mengenai visi-misi, struktur organisasi, kegiatan, serta berita desa setempat.</p>
                <a href="{{ route('public.news.index') }}" class="btn">Lihat Berita</a>
            </div>

            <div class="feature-card">
                <div class="card-icon">🏪</div>
                <h2>Katalog UMKM & Potensi Desa</h2>
                <p>Jelajahi usaha lokal dan potensi desa untuk dukung pelaku UMKM dan perekonomian desa.</p>
                <a href="{{ route('public.umkm.index') }}" class="btn">Lihat UMKM</a>
            </div>

            <div class="feature-card">
                <div class="card-icon">📄</div>
                <h2>Layanan Surat Mandiri</h2>
                <p>Ajukan surat dan cek status verifikasi dengan cepat setelah login ke sistem warga.</p>
                @auth
                    <a href="{{ route('warga.letters.create') }}" class="btn">Ajukan Surat</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Masuk / Ajukan Surat</a>
                @endauth
            </div>

            <div class="feature-card">
                <div class="card-icon">📝</div>
                <h2>E-Reporting</h2>
                <p>Laporkan kerusakan publik dengan foto dan pantau tindak lanjutnya melalui portal desa.</p>
                @auth
                    <a href="{{ route('warga.complaints.create') }}" class="btn">Laporkan Sekarang</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Login untuk Lapor</a>
                @endauth
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="public-card">
            <div class="card-icon-large">💰</div>
            <h2>Transparansi Keuangan APBDes</h2>
            <p>Pelajari ringkasan anggaran desa, realisasi pembangunan, dan penggunaan dana masyarakat secara transparan.</p>
            <a href="{{ route('public.budgets.index') }}" class="btn btn-lg">Lihat APBDes</a>
        </div>
    </section>
@endsection

