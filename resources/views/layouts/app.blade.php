<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Desa Duwet')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @unless (request()->routeIs('dashboard'))
        <div class="page-hero">
            <img src="{{ asset('images/slider1.jpg') }}" alt="Banner Desa Duwet">

            <div class="page-hero-header">
                <div class="logo-area">
                    <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Duwet">
                    <span class="site-title">Website Desa Duwet</span>
                </div>

                <nav class="site-nav" id="siteNav">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('informasi.index') }}" class="{{ request()->routeIs('informasi.index') ? 'active' : '' }}">Informasi Desa</a>
                    <a href="{{ route('struktur.index') }}" class="{{ request()->routeIs('struktur.index') ? 'active' : '' }}">Struktur Desa</a>
                    <a href="{{ route('peta.index') }}" class="{{ request()->routeIs('peta.index') ? 'active' : '' }}">Peta Desa</a>
                    <a href="{{ route('kontak.index') }}" class="{{ request()->routeIs('kontak.index') ? 'active' : '' }}">Kontak Desa</a>
                    <a href="{{ route('berita.public.index') }}" class="{{ request()->routeIs('berita.public.*') ? 'active' : '' }}">Berita</a>
                    <a href="{{ route('umkm.index') }}" class="{{ request()->routeIs('umkm.index') ? 'active' : '' }}">UMKM</a>
                    <a href="{{ route('pengaduan.create') }}" class="{{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">Pengaduan</a>
                </nav>

                <button class="hamburger" id="hamburgerBtn" aria-label="Buka menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="page-hero-overlay">
                @hasSection('spanduk')
                    @yield('spanduk')
                @else
                    <h1>Website Profil Desa Duwet</h1>
                @endif
            </div>
        </div>

        <div class="spanduk-marquee">
            <div class="spanduk-marquee-track">
                <span>📢 Selamat datang di Website Resmi Desa Duwet — Layanan informasi online 24 jam — Sampaikan aspirasi lewat menu Pengaduan — Kunjungi Katalog UMKM untuk mendukung produk warga lokal —</span>
                <span>📢 Selamat datang di Website Resmi Desa Duwet — Layanan informasi online 24 jam — Sampaikan aspirasi lewat menu Pengaduan — Kunjungi Katalog UMKM untuk mendukung produk warga lokal —</span>
            </div>
        </div>
    @endunless

    @yield('slider')

    <div class="content">
        @if (session('sukses'))
            <div class="alert-sukses">{{ session('sukses') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="site-footer-rich">
        <div class="footer-grid">

            <div class="footer-col">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Duwet">
                    <div>
                        <strong>Website Desa Duwet</strong>
                        <p>Kecamatan Tumpang, Kabupaten Malang</p>
                    </div>
                </div>
                <p class="footer-desc">Website resmi yang menyajikan informasi profil, pemerintahan, dan berita terkini Desa Duwet untuk masyarakat.</p>
            </div>

            <div class="footer-col">
                <h4>Statistik Kunjungan</h4>
                <ul class="footer-stat-list">
                    <li><span>Hari Ini</span><strong>{{ $statKunjungan['hari_ini'] }}</strong></li>
                    <li><span>Kemarin</span><strong>{{ $statKunjungan['kemarin'] }}</strong></li>
                    <li><span>Minggu Ini</span><strong>{{ $statKunjungan['minggu_ini'] }}</strong></li>
                    <li><span>Minggu Lalu</span><strong>{{ $statKunjungan['minggu_lalu'] }}</strong></li>
                    <li><span>Bulan Ini</span><strong>{{ $statKunjungan['bulan_ini'] }}</strong></li>
                    <li><span>Bulan Lalu</span><strong>{{ $statKunjungan['bulan_lalu'] }}</strong></li>
                    <li class="footer-stat-total"><span>Total Kunjungan</span><strong>{{ $statKunjungan['total'] }}</strong></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Kontak Desa</h4>
                @if ($kontakFooter)
                    <ul class="footer-contact-list">
                        <li>📍 {{ $kontakFooter->alamat }}</li>
                        <li>📞 {{ $kontakFooter->telepon }}</li>
                        <li>✉️ {{ $kontakFooter->email }}</li>
                        <li>🕒 {{ $kontakFooter->jam_pelayanan }}</li>
                    </ul>
                @else
                    <p>Data kontak belum tersedia.</p>
                @endif
            </div>

            <div class="footer-col">
                <h4>Jelajahi</h4>
                <ul class="footer-link-list">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('informasi.index') }}">Informasi Desa</a></li>
                    <li><a href="{{ route('struktur.index') }}">Struktur Desa</a></li>
                    <li><a href="{{ route('peta.index') }}">Peta Desa</a></li>
                    <li><a href="{{ route('berita.public.index') }}">Berita</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Website Profil Desa Duwet. Semua hak cipta dilindungi.</span>
        </div>
    </footer>

     @stack('scripts')

    @unless (request()->routeIs('dashboard'))
        <script>
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const siteNav = document.getElementById('siteNav');

            if (hamburgerBtn) {
                hamburgerBtn.addEventListener('click', function () {
                    siteNav.classList.toggle('nav-open');
                    hamburgerBtn.classList.toggle('active');
                });
            }
        </script>
    @endunless

</body>
</html>