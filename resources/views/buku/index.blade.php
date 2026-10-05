@extends('layouts.library')

@section('content')
    <section class="library-hero">
        <h1>Temukan buku favoritmu</h1>
        <p>Kelola koleksi perpustakaan dengan cepat, rapi, dan mudah dicari.</p>
    </section>
    <section class="library-card">
        <div class="library-actions"><h2 style="margin-right:auto;">Daftar Buku</h2><a href="{{ route('buku.create') }}" class="library-button amber">+ Tambah Buku</a></div>
        <form action="{{ route('buku.index') }}" method="GET" class="library-actions"><div class="library-search"><input class="library-input" type="search" name="search" value="{{ $search ?? '' }}" placeholder="Cari judul atau pengarang..."><button class="library-button" type="submit">Cari</button></div>@if(!empty($search)) <a href="{{ route('buku.index') }}" class="library-muted">Reset</a> @endif</form>
        <div class="library-table-wrap"><table class="library-table"><thead><tr><th>No</th><th>Kode</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr></thead><tbody>
            @forelse($buku as $index => $item)<tr><td>{{ $index + 1 }}</td><td>{{ $item->kode_buku }}</td><td><strong>{{ $item->judul }}</strong></td><td>{{ $item->pengarang }}</td><td>{{ $item->penerbit }}</td><td>{{ $item->tahun_terbit }}</td><td>{{ $item->stok }}</td><td><a href="{{ route('buku.edit', $item->id) }}">Edit</a></td></tr>@empty<tr><td colspan="8" class="library-muted">Buku tidak ditemukan.</td></tr>@endforelse
        </tbody></table></div>
    </section>
@endsection
