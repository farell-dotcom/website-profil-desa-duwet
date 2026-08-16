@extends('layouts.app')

@section('title', 'Struktur Desa - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Struktur Desa</h1>
    <p>Susunan Perangkat Desa Duwet</p>
@endsection

@section('content')
    @if ($struktur->count())
        <div class="struktur-grid">
            @foreach ($struktur as $item)
                <div class="struktur-card {{ $loop->first ? 'struktur-utama' : '' }}">
                    <div class="struktur-avatar">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}">
                        @else
                            {{ strtoupper(substr($item->nama, 0, 1)) }}
                        @endif
                    </div>
                    <div class="struktur-nama">{{ $item->nama }}</div>
                    <span class="struktur-jabatan">{{ $item->jabatan }}</span>
                </div>
            @endforeach
        </div>
    @else
        <p>Data struktur desa belum tersedia.</p>
    @endif
@endsection