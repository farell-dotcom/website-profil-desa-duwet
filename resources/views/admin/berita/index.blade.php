@extends('layouts.admin')

@section('title', 'Kelola Berita - Desa Duwet')

@section('content')
    <h2>Kelola Berita</h2>

    <a href="{{ route('admin.berita.create') }}" class="btn">+ Tambah Berita</a>

    <div class="card" style="margin-top:16px;">
        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Dibaca</th>
                <th>Ditulis Oleh</th>
                <th>Aksi</th>
            </tr>
            @forelse ($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                    <td><span class="badge">{{ $item->dibaca }}</span></td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada berita.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection