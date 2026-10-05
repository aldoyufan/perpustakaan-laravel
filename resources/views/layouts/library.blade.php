<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan' }} - {{ config('app.name', 'Perpustakaan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="library-body">
    <nav class="library-nav">
        <a href="{{ route('dashboard') }}" class="library-brand">
            <span class="brand-mark">▥</span>
            <span>Perpus<span class="brand-accent">Kita</span></span>
        </a>

        <div class="library-links">
            <a href="{{ route('buku.index') }}" class="library-link {{ request()->routeIs('buku.*') ? 'active' : '' }}">Data Buku</a>
            <a href="{{ route('anggota.index') }}" class="library-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}">Data Anggota</a>
            <a href="{{ route('peminjaman.create') }}" class="library-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">Peminjaman</a>
        </div>

        @auth
            <div class="library-user">
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="library-logout">Keluar</button>
                </form>
            </div>
        @endauth
    </nav>

    <main class="library-main">
        @if(session('success'))
            <div class="library-alert">✓ {{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="library-footer">PerpusKita · Kelola koleksi dan peminjaman dengan mudah</footer>
</body>
</html>
