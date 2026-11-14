<?php

namespace App\Http\Controllers;

use App\Models\IzinSiswa;
use Illuminate\Http\Request;

class IzinSiswaController extends Controller
{
    // index -> menampilkan halaman utama
    public function index()
    {
        $izinSiswa = IzinSiswa::get();
        $produk = $izinSiswa;

        return view('izin siswa.pages.produk', compact('izinSiswa', 'produk'));
    }

    // create -> untuk menampilkan halaman tambah
    public function create()
    {
        return view('izin siswa.pages.tambah');
    }

    // store -> untuk menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'keterangan' => 'required|string',
        ]);

        IzinSiswa::create([
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.izin-siswa.table');
    }

    // edit -> untuk menampilkan halaman edit
    public function edit($id)
    {
        $izinSiswa = IzinSiswa::find($id);
        $produk = $izinSiswa;

        return view('izin siswa.pages.update', compact('izinSiswa', 'produk'));
    }

    // update -> untuk menyimpan data yang diubah ke database
    public function update(Request $request, IzinSiswa $izinSiswa)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'keterangan' => 'required|string',
        ]);

        $izinSiswa->update([
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.izin-siswa.table')->with('success', 'Data izin siswa berhasil perbarui');
    }

    // destroy -> untuk menghapus data dari database
    public function destroy(IzinSiswa $izinSiswa)
    {
        $izinSiswa->delete();

        return redirect()->route('admin.izin-siswa.table')->with('success', 'Data izin siswa berhasil dihapus');
    }
}
