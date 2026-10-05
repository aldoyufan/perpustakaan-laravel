@extends('layouts.library')

@section('content')
    <section class="library-hero"><h1>Data Anggota</h1><p>Tambahkan anggota agar dapat dipilih saat membuat transaksi peminjaman.</p></section>
    <section class="library-card"><h2>Tambah Anggota</h2>
        @if ($errors->any()) <div class="library-alert">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div> @endif
        <form action="{{ route('anggota.store') }}" method="POST">@csrf
            <div class="library-form-grid"><div class="library-field"><label>Nama Anggota</label><input class="library-input" type="text" name="nama" value="{{ old('nama') }}" required></div><div class="library-field"><label>NIS</label><input class="library-input" type="text" name="nis" value="{{ old('nis') }}" required></div></div>
            <div class="library-actions" style="margin-top:1.25rem;"><button class="library-button amber" type="submit">Simpan Anggota</button></div>
        </form>
    </section>
@endsection
