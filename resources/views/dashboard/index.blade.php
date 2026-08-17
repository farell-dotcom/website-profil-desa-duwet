@extends('layouts.app')

@section('title', 'Dashboard - Website Desa Duwet')

@section('slider')
    <div class="hero">
        <div class="hero-slider" id="heroSlider">
            <img src="{{ asset('images/slider1.jpg') }}" class="active" alt="Foto Desa Duwet 1">
            <img src="{{ asset('images/slider2.jpg') }}" alt="Foto Desa Duwet 2">
            <img src="{{ asset('images/slider3.jpg') }}" alt="Foto Desa Duwet 3">
        </div>

        <div class="hero-header">
            <div class="logo-area">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Duwet">
                <span class="site-title">
                    Website Desa Duwet
                    <small>Kecamatan Tumpang, Kabupaten Malang</small>
                </span>
            </div>

            <div style="display:flex; align-items:center; gap:14px;">
                <nav class="hero-nav site-nav" id="siteNav">
                    <a href="{{ route('dashboard') }}" class="active">Home</a>
                    <a href="{{ route('informasi.index') }}">Informasi Desa</a>
                    <a href="{{ route('struktur.index') }}">Struktur Desa</a>
                    <a href="{{ route('peta.index') }}">Peta Desa</a>
                    <a href="{{ route('kontak.index') }}">Kontak Desa</a>
                    <a href="{{ route('berita.public.index') }}">Berita</a>
                    <a href="{{ route('umkm.index') }}">UMKM</a>
                    <a href="{{ route('pengaduan.create') }}">Pengaduan</a> 
                </nav>

                <button class="hamburger" id="hamburgerBtn" aria-label="Buka menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="hero-overlay-content">
            <h1>Selamat Datang</h1>
            <h2>Website Resmi Desa Duwet</h2>
            <p>Sumber informasi terbaru tentang pemerintahan dan kegiatan Desa Duwet</p>
        </div>

        <button class="hero-arrow hero-arrow-left" id="heroPrev" aria-label="Sebelumnya">&#10094;</button>
        <button class="hero-arrow hero-arrow-right" id="heroNext" aria-label="Berikutnya">&#10095;</button>

        <div class="visitor-badge">
            <span>📊</span>
            <span>
                <span class="angka">{{ $kunjunganHariIni }}</span>
                <span class="label">Kunjungan Hari Ini</span>
            </span>
        </div>
    </div>
@endsection

@section('content')

    <div class="section-header">
        <div class="section-title">
            <h2>Tentang Desa Duwet</h2>
            <p>Website ini menyediakan informasi resmi mengenai profil, struktur pemerintahan, peta lokasi, kontak, dan berita terbaru seputar Desa Duwet.</p>
        </div>
    </div>

    @if ($informasi && $informasi->sambutan)
        <div class="sambutan-box">
            @if ($informasi->foto_kepala_desa)
                <img src="{{ asset('storage/' . $informasi->foto_kepala_desa) }}" alt="Foto Kepala Desa Duwet">
            @else
                <img src="{{ asset('images/logo-desa.png') }}" alt="Foto Kepala Desa Duwet">
            @endif
            <div class="sambutan-text">
                <p>"{{ $informasi->sambutan }}"</p>
                @if ($informasi->nama_kepala_desa)
                    <strong>{{ $informasi->nama_kepala_desa }}</strong>
                    <span>Kepala Desa Duwet</span>
                @endif
            </div>
        </div>
    @endif

    @if ($informasi)
        <div class="section-header">
            <div class="section-title">
                <h2>Visi &amp; Misi Desa</h2>
                <p>Arah dan tujuan pembangunan Desa Duwet</p>
            </div>
            <a href="{{ route('informasi.index') }}" class="lihat-semua">Selengkapnya →</a>
        </div>

        <div class="info-block info-block-visi">
            <div class="info-icon">🎯</div>
            <div class="info-text">
                <h2>Visi</h2>
                <p>{{ $informasi->visi }}</p>
            </div>
        </div>

        <div class="info-block info-block-misi">
            <div class="info-icon">🌱</div>
            <div class="info-text">
                <h2>Misi</h2>
                <p>{{ $informasi->misi }}</p>
            </div>
        </div>
    @endif

    @if ($peta)
        <div class="section-header">
            <div class="section-title">
                <h2>Peta Lokasi Desa</h2>
                <p>{{ $peta->alamat }}</p>
            </div>
            <a href="{{ route('peta.index') }}" class="lihat-semua">Lihat Detail →</a>
        </div>

        <div class="content-card">
            <iframe src="{{ $peta->link_google_maps }}" width="100%" height="350" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @endif

    @if ($informasi && $informasi->jumlah_laki_laki)
        <div class="section-header">
            <div class="section-title">
                <h2>Administrasi Penduduk</h2>
                <p>Data kependudukan Desa Duwet</p>
            </div>
        </div>

        <div class="penduduk-grid">
            <div class="penduduk-card">
                <span class="penduduk-angka">{{ $informasi->jumlah_penduduk }}</span>
                <span class="penduduk-label">Total Penduduk</span>
            </div>
            <div class="penduduk-card">
                <span class="penduduk-angka">{{ $informasi->jumlah_laki_laki }}</span>
                <span class="penduduk-label">Laki-laki</span>
            </div>
            <div class="penduduk-card">
                <span class="penduduk-angka">{{ $informasi->jumlah_perempuan }}</span>
                <span class="penduduk-label">Perempuan</span>
            </div>
            <div class="penduduk-card">
                <span class="penduduk-angka">{{ $informasi->jumlah_kk }}</span>
                <span class="penduduk-label">Kepala Keluarga</span>
            </div>
        </div>
    @endif

    <div class="section-header">
        <div class="section-title">
            <h2>Menu Utama</h2>
            <p>Akses cepat ke informasi seputar Desa Duwet</p>
        </div>
    </div>
    <div class="icon-card-grid">
        <a href="{{ route('informasi.index') }}" class="icon-card">
            <div class="icon-circle">📋</div>
            <div class="icon-label">Informasi Desa</div>
        </a>
        <a href="{{ route('struktur.index') }}" class="icon-card">
            <div class="icon-circle">👥</div>
            <div class="icon-label">Struktur Desa</div>
        </a>
        <a href="{{ route('peta.index') }}" class="icon-card">
            <div class="icon-circle">🗺️</div>
            <div class="icon-label">Peta Desa</div>
        </a>
        <a href="{{ route('berita.public.index') }}" class="icon-card">
            <div class="icon-circle">📰</div>
            <div class="icon-label">Berita Terbaru</div>
        </a>
    </div>

    <div class="section-header">
        <div class="section-title">
            <h2>Berita Desa</h2>
            <p>Peristiwa dan kabar terbaru dari Desa Duwet</p>
        </div>
        <a href="{{ route('berita.public.index') }}" class="lihat-semua">Lihat Semua →</a>
    </div>
    <div class="berita-card-grid">
        @forelse ($beritaTerkini as $item)
            <div class="berita-card">
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                @endif
                <div class="berita-card-body">
                    <span class="badge">{{ $item->tanggal->format('d-m-Y') }}</span>
                    <h3><a href="{{ route('berita.public.show', $item->id) }}">{{ $item->judul }}</a></h3>
                    <p>{{ Str::limit($item->isi, 100) }}</p>
                </div>
            </div>
        @empty
            <p>Belum ada berita.</p>
        @endforelse
    </div>

@endsection

@push('scripts')
<script>
    let heroSlides = document.querySelectorAll('#heroSlider img');
    let heroCurrent = 0;
    let heroInterval;

    function showHeroSlide(index) {
        heroSlides.forEach(img => img.classList.remove('active'));
        heroCurrent = (index + heroSlides.length) % heroSlides.length;
        heroSlides[heroCurrent].classList.add('active');
    }

    function startHeroAutoSlide() {
        heroInterval = setInterval(function () {
            showHeroSlide(heroCurrent + 1);
        }, 4000);
    }

    if (heroSlides.length > 0) {
        startHeroAutoSlide();

        const heroPrev = document.getElementById('heroPrev');
        const heroNext = document.getElementById('heroNext');

        heroPrev.addEventListener('click', function () {
            clearInterval(heroInterval);
            showHeroSlide(heroCurrent - 1);
            startHeroAutoSlide();
        });

        heroNext.addEventListener('click', function () {
            clearInterval(heroInterval);
            showHeroSlide(heroCurrent + 1);
            startHeroAutoSlide();
        });
    }

    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const siteNav = document.getElementById('siteNav');

    if (hamburgerBtn) {
        hamburgerBtn.addEventListener('click', function () {
            siteNav.classList.toggle('nav-open');
            hamburgerBtn.classList.toggle('active');
        });
    }
</script>
@endpush