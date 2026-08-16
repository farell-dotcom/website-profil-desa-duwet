@extends('layouts.admin')

@section('title', 'Edit Berita - Desa Duwet')

@section('content')
    <h2>Edit Berita</h2>

    <div class="card">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita</label>
                <textarea id="isi" name="isi" rows="6">{{ old('isi', $berita->isi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}">
            </div>

            <div class="form-group">
                <label>Gambar Saat Ini</label><br>
                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" style="width:200px; border-radius:6px; margin-bottom:10px;">
                @else
                    <span>Belum ada gambar</span>
                @endif
            </div>

            <div class="form-group">
                <label for="gambar">Ganti Gambar (kosongkan jika tidak diubah)</label>
                <input type="file" id="gambar" name="gambar">
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
@endsection