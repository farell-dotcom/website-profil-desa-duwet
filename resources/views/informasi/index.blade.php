@extends('layouts.app')

@section('title', 'Informasi Desa - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Informasi Desa</h1>
    <p>Profil, Visi, Misi, dan Sejarah Desa Duwet</p>
@endsection

@section('content')
    @if ($informasi)
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

        <div class="info-block info-block-sejarah">
            <div class="info-icon">📜</div>
            <div class="info-text">
                <h2>Sejarah</h2>
                <p>{{ $informasi->sejarah }}</p>
            </div>
        </div>

        <div class="stat-card-grid">
            <div class="stat-card">
                <div class="stat-icon">📐</div>
                <div>
                    <span class="stat-value">{{ $informasi->luas_wilayah }}</span>
                    <span class="stat-label">Luas Wilayah</span>
                </div>
            </div>
        </div>

        @if ($informasi->jumlah_laki_laki)
            <div class="section-header">
                <div class="section-title">
                    <h2>Administrasi Penduduk</h2>
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
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div>
                    <span class="stat-value">{{ $informasi->jumlah_penduduk }}</span>
                    <span class="stat-label">Jumlah Penduduk</span>
                </div>
            </div>
        </div>
    @else
        <p>Data informasi desa belum tersedia.</p>
    @endif
@endsection