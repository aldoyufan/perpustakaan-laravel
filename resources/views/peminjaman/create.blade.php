@extends('layouts.library')

@section('content')
    <section class="library-hero"><h1>Peminjaman Buku</h1><p>Catat transaksi peminjaman buku dengan data anggota dan tanggal yang jelas.</p></section>
    <section class="library-card"><h2>Form Transaksi Peminjaman</h2>
        @if ($errors->any()) <div class="library-alert">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div> @endif
        <form action="{{ route('peminjaman.store') }}" method="POST">@csrf
            <div class="library-form-grid">
                <div class="library-field"><label>Pilih Buku</label><select class="library-input" name="buku_id" required><option value="">-- Pilih Buku --</option>@foreach($buku as $item)<option value="{{ $item->id }}">{{ $item->judul }} (Stok: {{ $item->stok }})</option>@endforeach</select></div>
                <div class="library-field"><label>Pilih Anggota</label><select class="library-input" name="anggota_id" required><option value="">-- Pilih Anggota --</option>@foreach($anggota as $agt)<option value="{{ $agt->id }}">{{ $agt->nama }} (NIS: {{ $agt->nis }})</option>@endforeach</select><a href="{{ route('anggota.create') }}" class="library-muted">+ Tambah anggota baru</a></div>
                <div class="library-field"><label>Tanggal Pinjam</label><input class="library-input" type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required></div>
                <div class="library-field"><label>Tanggal Kembali</label><input class="library-input" type="date" name="tanggal_kembali" required></div>
            </div>
            <div class="library-actions" style="margin-top:1.25rem;"><button class="library-button amber" type="submit">Simpan Peminjaman</button><a class="library-button" href="{{ route('peminjaman.index') }}">Lihat Data Peminjaman</a></div>
        </form>
    </section>
@endsection
