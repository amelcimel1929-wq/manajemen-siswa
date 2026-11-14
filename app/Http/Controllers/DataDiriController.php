<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    // index -> menampilkan halaman utama
    public function index()
    {
        $dataDiri = DataDiri::get();
        $produk = $dataDiri;

        return view('data diri.pages.produk', compact('dataDiri', 'produk'));
    }

    // create -> untuk menampilkan halaman tambah
    public function create()
    {
        return view('data diri.pages.tambah');
    }

    // store -> untuk menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string',
        ]);

        DataDiri::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.data-diri.table');
    }

    // edit -> untuk menampilkan halaman edit
    public function edit($id)
    {
        $dataDiri = DataDiri::find($id);
        $produk = $dataDiri;

        return view('data diri.pages.update', compact('dataDiri', 'produk'));
    }

    // update -> untuk menyimpan data yang diubah ke database
    public function update(Request $request, DataDiri $dataDiri)
    {
        $request->validate([
            'nis' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string',
        ]);

        $dataDiri->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.data-diri.table')->with('success', 'Data diri berhasil perbarui');
    }

    // destroy -> untuk menghapus data dari database
    public function destroy(DataDiri $dataDiri)
    {
        $dataDiri->delete();

        return redirect()->route('admin.data-diri.table')->with('success', 'Data diri berhasil dihapus');
    }
}
