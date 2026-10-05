<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
</head>
<body>
    <div style="width: 50%; margin: 20px auto;">
        <h2>Edit Data Buku</h2>

        <!-- Tampilkan Pesan Error Validasi jika ada -->
        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Buku dengan Method PUT -->
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 10px;">
                <label>Kode Buku (Tidak dapat diubah):</label><br>
                <input type="text" name="kode_buku" value="{{ $buku->kode_buku }}" readonly style="width: 100%; padding: 5px; background: #e9ecef;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Judul Buku:</label><br>
                <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Pengarang:</label><br>
                <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Penerbit:</label><br>
                <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Tahun Terbit:</label><br>
                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Stok:</label><br>
                <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" style="width: 100%; padding: 5px;">
            </div>

            <button type="submit" style="padding: 8px 15px; background: orange; color: white; border: none; cursor: pointer;">Perbarui Data</button>
            <a href="{{ route('buku.index') }}" style="margin-left: 10px; text-decoration: none;">Kembali</a>
        </form>
    </div>
</body>
</html>