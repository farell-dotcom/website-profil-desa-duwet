@extends('layouts.app')

@section('title', $berita->judul . ' - Website Profil Desa Duwet')

@section('spanduk')
    <h1>{{ $berita->judul }}</h1>
    <p>{{ $berita->tanggal->format('d-m-Y') }} &mdash; Ditulis oleh {{ $berita->user->name }}</p>
@endsection

@section('content')
    <div class="content-card">
        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" style="width:100%; border-radius:10px; margin-bottom:15px;">
        @endif

        <p>{{ $berita->isi }}</p>

        <span class="badge">Dibaca {{ $berita->dibaca }} kali</span>
    </div>

    <a href="{{ route('berita.public.index') }}" class="btn">← Kembali ke Berita</a>
@endsection