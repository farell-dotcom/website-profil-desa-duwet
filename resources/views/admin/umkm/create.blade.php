@extends('layouts.admin')

@section('title', 'Tambah UMKM - Desa Duwet')

@section('content')
    <h2>Tambah UMKM</h2>

    <div class="card">
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha') }}">
            </div>

            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="kontak">Nomor WhatsApp Penjual (format: 62812xxxxxxx)</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat (opsional)</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}">
            </div>

            <div class="form-group">
                <label for="foto">Foto Produk</label>
                <input type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection