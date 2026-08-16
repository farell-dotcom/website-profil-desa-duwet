@extends('layouts.admin')

@section('title', 'Edit Perangkat Desa - Desa Duwet')

@section('content')
    <h2>Edit Perangkat Desa</h2>

    <div class="card">
        <form action="{{ route('admin.struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $struktur->nama) }}">
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}">
            </div>

            <div class="form-group">
                <label>Foto Saat Ini</label><br>
                @if ($struktur->foto)
                    <img src="{{ asset('storage/' . $struktur->foto) }}" style="width:100px; height:100px; border-radius:10px; object-fit:cover; margin-bottom:10px;">
                @else
                    <span>Belum ada foto</span>
                @endif
            </div>

            <div class="form-group">
                <label for="foto">Ganti Foto (kosongkan jika tidak diubah)</label>
                <input type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
@endsection