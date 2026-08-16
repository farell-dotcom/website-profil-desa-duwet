@extends('layouts.app')

@section('title', 'Katalog UMKM - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Katalog UMKM Desa</h1>
    <p>Produk Lokal, Kerajinan, dan Kuliner Warga Desa Duwet</p>
@endsection

@section('content')
    <div class="berita-card-grid">
        @forelse ($umkm as $item)
            <div class="berita-card">
                @if ($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_usaha }}">
                @endif
                <div class="berita-card-body">
                    <h3>{{ $item->nama_usaha }}</h3>
                    <p>Pemilik: {{ $item->nama_pemilik }}</p>
                    <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                    @if ($item->alamat)
                        <p>📍 {{ $item->alamat }}</p>
                    @endif
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->kontak) }}" target="_blank" class="btn">💬 Hubungi Penjual</a>
                </div>
            </div>
        @empty
            <p>Belum ada UMKM yang terdaftar.</p>
        @endforelse
    </div>
@endsection