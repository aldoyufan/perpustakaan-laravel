@extends('layouts.library')

@section('content')
    <section class="library-hero">
        <h1>Selamat datang di PerpusKita</h1>
        <p>Kelola koleksi buku, data anggota, dan transaksi peminjaman dari satu halaman.</p>
    </section>
    <section class="library-card">
        <h2>Pusat Aktivitas</h2>
        <div class="library-actions">
            <a href="{{ route('buku.index') }}" class="library-button">Kelola Data Buku</a>
            <a href="{{ route('anggota.create') }}" class="library-button amber">Tambah Anggota</a>
            <a href="{{ route('peminjaman.create') }}" class="library-button">Buat Peminjaman</a>
        </div>
        <p class="library-muted">Gunakan navbar di bagian atas untuk berpindah halaman.</p>
    </section>
@endsection
