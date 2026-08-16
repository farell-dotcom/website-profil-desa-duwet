@extends('layouts.admin')

@section('title', 'Kelola UMKM - Desa Duwet')

@section('content')
    <h2>Kelola Katalog UMKM</h2>

    <a href="{{ route('admin.umkm.create') }}" class="btn">+ Tambah UMKM</a>

    <div class="card" style="margin-top:16px;">
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Usaha</th>
                <th>Pemilik</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
            @forelse ($umkm as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" style="width:50px; height:50px; border-radius:8px; object-fit:cover;">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->nama_usaha }}</td>
                    <td>{{ $item->nama_pemilik }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data UMKM.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection