@extends('layouts.admin')

@section('title', 'Pengaduan Masyarakat - Desa Duwet')

@section('content')
    <h2>Daftar Pengaduan Masyarakat</h2>

    <div class="card">
        <table>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Isi Pengaduan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @forelse ($pengaduan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ Str::limit($item->isi, 60) }}</td>
                    <td>
                        <form action="{{ route('admin.pengaduan.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="baru" {{ $item->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.pengaduan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada pengaduan masuk.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection