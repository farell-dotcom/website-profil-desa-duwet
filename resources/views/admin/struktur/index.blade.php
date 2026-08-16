@extends('layouts.admin')

@section('title', 'Kelola Struktur Desa - Desa Duwet')

@section('content')
    <h2>Kelola Struktur Desa</h2>

    <a href="{{ route('admin.struktur.create') }}" class="btn">+ Tambah Perangkat Desa</a>

    <div class="card" style="margin-top:16px;">
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
            @forelse ($struktur as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" style="width:50px; height:50px; border-radius:8px; object-fit:cover;">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>
                        <a href="{{ route('admin.struktur.edit', $item->id) }}" class="btn">Edit</a>
                        <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data perangkat desa.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection