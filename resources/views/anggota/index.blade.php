@extends('layouts.library')

@section('content')
    <section class="library-hero">
        <h1>Data Anggota</h1>
        <p>Kelola anggota perpustakaan dan hapus data yang sudah tidak diperlukan.</p>
    </section>

    <section class="library-card">
        <div class="library-actions">
            <h2 style="margin-right:auto;">Daftar Anggota</h2>
            <a href="{{ route('anggota.create') }}" class="library-button amber">+ Tambah Anggota</a>
        </div>

        @if(session('success')) <div class="library-alert">✓ {{ session('success') }}</div> @endif
        @if(session('error')) <div class="library-alert" style="color:#991b1b;background:#fee2e2;border-color:#fca5a5;">{{ session('error') }}</div> @endif

        <div class="library-table-wrap">
            <table class="library-table">
                <thead><tr><th>No</th><th>Nama</th><th>NIS</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse($anggota as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td><td>{{ $item->nama }}</td><td>{{ $item->nis }}</td>
                            <td><form action="{{ route('anggota.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">@csrf @method('DELETE')<button type="submit" class="library-button" style="background:#b91c1c;">Hapus</button></form></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="library-muted">Belum ada data anggota.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
