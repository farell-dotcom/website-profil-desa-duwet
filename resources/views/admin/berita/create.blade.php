@extends('layouts.admin')

@section('title', 'Tambah Berita - Desa Duwet')

@section('content')
    <h2>Tambah Berita</h2>

    <div class="card">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita</label>
                <textarea id="isi" name="isi" rows="6">{{ old('isi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Berita</label>
                <input type="file" id="gambar" name="gambar">
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection