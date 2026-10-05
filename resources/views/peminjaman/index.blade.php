@extends('layouts.library')

@section('content')
    <section class="library-hero"><h1>Riwayat Peminjaman</h1><p>Semua transaksi peminjaman tersimpan di satu tempat.</p></section>
    <section class="library-card"><div class="library-actions"><h2 style="margin-right:auto;">Data Peminjaman</h2><a href="{{ route('peminjaman.create') }}" class="library-button amber">+ Peminjaman Baru</a></div>
        <div class="library-table-wrap"><table class="library-table"><thead><tr><th>No</th><th>Buku</th><th>Anggota</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Status</th></tr></thead><tbody>
            @forelse($peminjaman as $index => $item)<tr><td>{{ $index + 1 }}</td><td>{{ $item->buku->judul ?? '-' }}</td><td>{{ $item->anggota->nama ?? '-' }}</td><td>{{ $item->tanggal_pinjam }}</td><td>{{ $item->tanggal_kembali }}</td><td>{{ $item->status }}</td></tr>@empty<tr><td colspan="6" class="library-muted">Belum ada transaksi.</td></tr>@endforelse
        </tbody></table></div>
    </section>
@endsection
