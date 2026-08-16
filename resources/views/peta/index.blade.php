@extends('layouts.app')

@section('title', 'Peta Desa - Website Profil Desa Duwet')

@section('spanduk')
    <h1>Peta Desa</h1>
    <p>Lokasi dan Batas Wilayah Desa Duwet</p>
@endsection

@section('content')
    @if ($peta)
        <div class="content-card">
            <h2>Alamat</h2>
            <p>{{ $peta->alamat }}</p>

            <h2>Deskripsi</h2>
            <p>{{ $peta->deskripsi }}</p>

            <h2>Peta Lokasi</h2>
            <iframe src="{{ $peta->link_google_maps }}" width="100%" height="450" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @else
        <p>Data peta desa belum tersedia.</p>
    @endif
@endsection