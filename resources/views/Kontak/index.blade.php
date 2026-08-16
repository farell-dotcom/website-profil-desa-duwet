@extends('layouts.app')

@section('title', 'Kontak Desa - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Kontak Desa</h1>
    <p>Hubungi Kantor Desa Duwet</p>
@endsection

@section('content')
    @if ($kontak)
        <div class="stat-card-grid">
            <div class="stat-card">
                <div class="stat-icon">📍</div>
                <div>
                    <span class="stat-value">{{ $kontak->alamat }}</span>
                    <span class="stat-label">Alamat</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📞</div>
                <div>
                    <span class="stat-value">{{ $kontak->telepon }}</span>
                    <span class="stat-label">Telepon</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✉️</div>
                <div>
                    <span class="stat-value">{{ $kontak->email }}</span>
                    <span class="stat-label">Email</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🕒</div>
                <div>
                    <span class="stat-value">{{ $kontak->jam_pelayanan }}</span>
                    <span class="stat-label">Jam Pelayanan</span>
                </div>
            </div>
        </div>
    @else
        <p>Data kontak desa belum tersedia.</p>
    @endif
@endsection