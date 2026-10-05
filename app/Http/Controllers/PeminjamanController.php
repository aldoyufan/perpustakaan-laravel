<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    // Menampilkan daftar data peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Menampilkan form tambah peminjaman
    public function create()
    {
        $buku = Buku::where('stok', '>', 0)->get(); // Hanya buku yang stoknya ada
        $anggota = Anggota::all();
        return view('peminjaman.create', compact('buku', 'anggota'));
    }

    // Menyimpan data transaksi peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'anggota_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        // Simpan data peminjaman dengan status awal 'Dipinjam'
        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'anggota_id' => $request->anggota_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Dipinjam',
        ]);

        // Kurangi stok buku yang dipinjam
        $buku = Buku::find($request->buku_id);
        $buku->decrement('stok');

        return redirect()->route('peminjaman.index')
            ->with('success', 'Transaksi peminjaman berhasil ditambahkan');
    }

    // Menghapus/Membatalkan peminjaman (opsional untuk pengembalian stok)
    public function destroy(Peminjaman $peminjaman)
    {
        // Kembalikan stok buku jika transaksi dihapus
        $peminjaman->buku->increment('stok');
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus');
    }
}
