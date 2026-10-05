@extends('layouts.library')

@section('content')
    <section class="library-card"><h2>Tambah Buku Baru</h2>
        @if ($errors->any()) <div class="library-alert">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div> @endif
        <form action="{{ route('buku.store') }}" method="POST">@csrf
            <div class="library-form-grid">
                @foreach([['kode_buku','Kode Buku','text'],['judul','Judul Buku','text'],['pengarang','Pengarang','text'],['penerbit','Penerbit','text'],['tahun_terbit','Tahun Terbit','number'],['stok','Stok','number']] as [$name,$label,$type])
                    <div class="library-field"><label>{{ $label }}</label><input class="library-input" type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" required></div>
                @endforeach
            </div>
            <div class="library-actions" style="margin-top:1.25rem;"><button class="library-button amber" type="submit">Simpan Buku</button><a class="library-muted" href="{{ route('buku.index') }}">Kembali</a></div>
        </form>
    </section>
@endsection
