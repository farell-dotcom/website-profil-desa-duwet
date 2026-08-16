@extends('layouts.admin')

@section('title', 'Tambah Akun Admin - Desa Duwet')

@section('content')
    <h2>Tambah Akun Admin</h2>

    <div class="card">
        <form action="{{ route('admin.akun.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection