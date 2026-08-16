@extends('layouts.app')

@section('title', 'Berita - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Berita Desa Duwet</h1>
    <p>Informasi dan Kabar Terbaru Seputar Desa</p>
@endsection

@section('content')
    <form action="{{ route('berita.public.index') }}" method="GET" class="search-box">
        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Cari judul berita...">
        <button type="submit" class="btn">Cari</button>
        @if ($keyword)
            <a href="{{ route('berita.public.index') }}" class="btn btn-danger">Reset</a>
        @endif
    </form>

    @if ($keyword)
        <p>Hasil pencarian untuk: <strong>"{{ $keyword }}"</strong></p>
    @endif

    <div class="berita-card-grid">
        @forelse ($berita as $item)
            <div class="berita-card">
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                @endif
                <div class="berita-card-body">
                    <span class="badge">{{ $item->tanggal->format('d-m-Y') }}</span>
                    <span class="badge">Dibaca {{ $item->dibaca }} kali</span>
                    <h3><a href="{{ route('berita.public.show', $item->id) }}">{{ $item->judul }}</a></h3>
                    <p>{{ Str::limit($item->isi, 100) }}</p>
                </div>
            </div>
        @empty
            <p>Berita tidak ditemukan.</p>
        @endforelse
    </div>
@endsection