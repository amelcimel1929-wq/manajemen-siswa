<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // index -> menampilkan halaman utama data nilai
    public function index()
    {
        $nilai = Nilai::all();
        $produk = $nilai;

        return view('nilai.pages.produk', compact('nilai', 'produk'));
    }

    // create -> untuk menampilkan form tambah nilai
    public function create()
    {
        return view('nilai.pages.tambah');
    }

    // store -> untuk menyimpan data nilai ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'nilai' => 'required|integer|min:0|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        Nilai::create([
            'nama_siswa' => $request->nama_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.nilai.table')->with('success', 'Data nilai berhasil ditambahkan');
    }

    // edit -> untuk menampilkan form edit nilai
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $produk = $nilai;

        return view('nilai.pages.update', compact('nilai', 'produk'));
    }

    // update -> untuk menyimpan perubahan nilai ke database
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'nilai' => 'required|integer|min:0|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        $nilai->update([
            'nama_siswa' => $request->nama_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.nilai.table')->with('success', 'Data nilai berhasil diperbarui');
    }

    // destroy -> untuk menghapus data nilai dari database
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('admin.nilai.table')->with('success', 'Data nilai berhasil dihapus');
    }
}
