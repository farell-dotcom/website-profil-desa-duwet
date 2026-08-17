@extends('layouts.app')

@section('title', 'Pengaduan Masyarakat - Website Desa Duwet')

@section('spanduk')
    <h1>Pengaduan Masyarakat</h1>
    <p>Sampaikan Aspirasi, Kritik, atau Keluhan Anda</p>
@endsection

@section('content')
    <div class="content-card">
        <p>Isi form di bawah ini. Setelah dikirim, kamu akan diarahkan otomatis ke WhatsApp untuk menyampaikan pengaduan langsung ke kantor desa.</p>

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon/WhatsApp</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon') }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Pengaduan / Aspirasi / Kritik</label>
                <textarea id="isi" name="isi" rows="6">{{ old('isi') }}</textarea>
            </div>

            <button type="submit" class="btn">Kirim via WhatsApp</button>
        </form>
    </div>
@endsection