@extends('layouts.admin')

@section('title', 'Dashboard Admin - Desa Duwet')

@section('content')
    <h2>Selamat Datang, {{ auth()->user()->name }}</h2>

    <div class="statistik-grid">
        <div class="statistik-box">
            <span class="angka">{{ $totalKunjungan }}</span>
            <span class="label">Total Kunjungan Dashboard</span>
        </div>
        <div class="statistik-box">
            <span class="angka">{{ $totalBerita }}</span>
            <span class="label">Total Berita</span>
        </div>
    </div>

    <h2>Berita Terpopuler (5 Teratas)</h2>
    <div class="card">
        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Dibaca</th>
            </tr>
            @forelse ($beritaTerpopuler as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td><span class="badge">{{ $item->dibaca }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection