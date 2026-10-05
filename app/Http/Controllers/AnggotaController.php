<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:anggotas,nis',
        ]);

        Anggota::create($data);

        return redirect()->route('peminjaman.create')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function destroy(Anggota $anggota)
    {
        if (Peminjaman::where('anggota_id', $anggota->id)->exists()) {
            return redirect()->route('anggota.index')
                ->with('error', 'Anggota tidak dapat dihapus karena masih memiliki transaksi peminjaman.');
        }

        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}
