<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin - Website Profil Desa Duwet')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="logo-area">
            <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Duwet">
            <span class="site-title">Panel Admin - Desa Duwet</span>
        </div>

        <div style="display:flex; align-items:center; gap:14px;">
            <span style="color:#ffffff; font-size:14px;">
                {{ auth()->user()->name }}
                <span class="badge">{{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}</span>
            </span>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn-login-header" style="border:none; cursor:pointer;">Logout</button>
            </form>
        </div>
    </header>

    <nav class="site-nav" id="siteNav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard Admin</a>
        <a href="{{ route('admin.informasi.edit') }}" class="{{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">Informasi Desa</a>
        <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">Kelola Berita</a>
        <a href="{{ route('admin.umkm.index') }}" class="{{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">Kelola UMKM</a>
        <a href="{{ route('admin.pengaduan.index') }}" class="{{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">Pengaduan</a>
        <a href="{{ route('admin.struktur.index') }}" class="{{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">Struktur Desa</a>
        @if (auth()->user()->isSuperAdmin())
            <a href="{{ route('admin.akun.index') }}" class="{{ request()->routeIs('admin.akun.*') ? 'active' : '' }}">Kelola Akun Admin</a>
        @endif
        <a href="{{ route('dashboard') }}">Lihat Website Publik</a>
    </nav>

    <div class="content">
        @if (session('sukses'))
            <div class="alert-sukses">{{ session('sukses') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="site-footer">
        &copy; {{ date('Y') }} Panel Admin - Website Profil Desa Duwet.
    </footer>

    @stack('scripts')

    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const siteNav = document.getElementById('siteNav');

        if (hamburgerBtn) {
            hamburgerBtn.addEventListener('click', function () {
                siteNav.classList.toggle('nav-open');
                hamburgerBtn.classList.toggle('active');
            });
        }
    </script>

</body>
</html>