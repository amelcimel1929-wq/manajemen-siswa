<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // index -> menampilkan daftar siswa
    public function index()
    {
        $siswa = Siswa::all();
        $produk = $siswa;

        return view('siswa.pages.produk', compact('siswa', 'produk'));
    }

    // create -> menampilkan form tambah/create siswa
    public function create()
    {
        return view('siswa.pages.tambah');
    }

    // store -> menyimpan data siswa baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string',
        ]);

        Siswa::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.siswa.table')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // edit -> menampilkan form edit data siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $produk = $siswa;

        return view('siswa.pages.update', compact('siswa', 'produk'));
    }

    // update -> menyimpan perubahan data siswa ke database
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nik' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string',
        ]);

        $siswa->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.siswa.table')->with('success', 'Data siswa berhasil diperbarui');
    }

    // destroy -> menghapus data siswa dari database
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('admin.siswa.table')->with('success', 'Data siswa berhasil dihapus');
    }
}
