@extends('layouts.admin')

@section('title', 'Tambah Perangkat Desa - Desa Duwet')

@section('content')
    <h2>Tambah Perangkat Desa</h2>

    <div class="card">
        <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
            </div>

            <div class="form-group">
                <label for="foto">Foto (persegi, disarankan rasio 1:1)</label>
                <input type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection