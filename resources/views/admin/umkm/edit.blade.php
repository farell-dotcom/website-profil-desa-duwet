@extends('layouts.admin')

@section('title', 'Edit UMKM - Desa Duwet')

@section('content')
    <h2>Edit UMKM</h2>

    <div class="card">
        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}">
            </div>

            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik', $umkm->nama_pemilik) }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="kontak">Nomor WhatsApp Penjual</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $umkm->kontak) }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $umkm->alamat) }}">
            </div>

            <div class="form-group">
                <label>Foto Saat Ini</label><br>
                @if ($umkm->foto)
                    <img src="{{ asset('storage/' . $umkm->foto) }}" style="width:100px; border-radius:8px; margin-bottom:10px;">
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