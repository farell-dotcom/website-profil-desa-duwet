@extends('layouts.admin')

@section('title', 'Kelola Akun Admin - Desa Duwet')

@section('content')
    <h2>Kelola Akun Admin</h2>

    <a href="{{ route('admin.akun.create') }}" class="btn">+ Tambah Akun Admin</a>

    <div class="card" style="margin-top:16px;">
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            @forelse ($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form action="{{ route('admin.akun.destroy', $admin->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada akun admin.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection