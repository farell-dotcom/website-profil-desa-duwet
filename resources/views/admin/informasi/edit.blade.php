@extends('layouts.admin')

@section('title', 'Kelola Informasi Desa - Desa Duwet')

@section('content')
    <h2>Kelola Informasi Desa</h2>

    <div class="card">
        <form action="{{ route('admin.informasi.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="visi">Visi</label>
                <textarea id="visi" name="visi" rows="3">{{ old('visi', $informasi->visi ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea id="misi" name="misi" rows="3">{{ old('misi', $informasi->misi ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="sejarah">Sejarah</label>
                <textarea id="sejarah" name="sejarah" rows="5">{{ old('sejarah', $informasi->sejarah ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="luas_wilayah">Luas Wilayah</label>
                <input type="text" id="luas_wilayah" name="luas_wilayah" value="{{ old('luas_wilayah', $informasi->luas_wilayah ?? '') }}">
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                <input type="text" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $informasi->jumlah_penduduk ?? '') }}">
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk (Total)</label>
                <input type="text" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $informasi->jumlah_penduduk ?? '') }}">
            </div>

            <div class="form-group">
                <label for="jumlah_laki_laki">Jumlah Laki-laki</label>
                <input type="text" id="jumlah_laki_laki" name="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $informasi->jumlah_laki_laki ?? '') }}">
            </div>

            <div class="form-group">
                <label for="jumlah_perempuan">Jumlah Perempuan</label>
                <input type="text" id="jumlah_perempuan" name="jumlah_perempuan" value="{{ old('jumlah_perempuan', $informasi->jumlah_perempuan ?? '') }}">
            </div>

            <div class="form-group">
                <label for="jumlah_kk">Jumlah Kepala Keluarga (KK)</label>
                <input type="text" id="jumlah_kk" name="jumlah_kk" value="{{ old('jumlah_kk', $informasi->jumlah_kk ?? '') }}">
            </div>

            <hr style="margin: 24px 0; border: none; border-top: 1px solid #e0e0e0;">

            <h2 style="margin-bottom:16px;">Sambutan Kepala Desa</h2>

            <div class="form-group">
                <label for="nama_kepala_desa">Nama Kepala Desa</label>
                <input type="text" id="nama_kepala_desa" name="nama_kepala_desa" value="{{ old('nama_kepala_desa', $informasi->nama_kepala_desa ?? '') }}">
            </div>

            <div class="form-group">
                <label for="sambutan">Teks Sambutan</label>
                <textarea id="sambutan" name="sambutan" rows="5">{{ old('sambutan', $informasi->sambutan ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto Saat Ini</label><br>
                @if (isset($informasi) && $informasi->foto_kepala_desa)
                    <img src="{{ asset('storage/' . $informasi->foto_kepala_desa) }}" style="width:120px; height:120px; border-radius:50%; object-fit:cover; margin-bottom:10px;">
                @else
                    <span>Belum ada foto</span>
                @endif
            </div>

            <div class="form-group">
                <label for="foto_kepala_desa">Ganti Foto Kepala Desa (kosongkan jika tidak diubah)</label>
                <input type="file" id="foto_kepala_desa" name="foto_kepala_desa">
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
        </form>
    </div>
@endsection