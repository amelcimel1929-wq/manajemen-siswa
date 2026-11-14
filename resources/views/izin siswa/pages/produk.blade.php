@extends('izin siswa.index')
@section('content')
<main class="main">
            <header class="page-header">
                <div>
                    <h1>Izin Siswa</h1>
                    <p class="subtitle">Kelola data izin siswa.</p>
                </div>
                <a href="{{ route('admin.izin-siswa.tambah') }}" class="btn btn-primary">
                    + Tambah Izin Siswa
                </a>
            </header>

            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <section class="card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="daftarProduk">
                            @foreach ($izinSiswa ?? $produk as $item)
                            <tr data-nama="{{ $item->keterangan }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_akhir)->format('Y-m-d') }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('admin.izin-siswa.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('admin.izin-siswa.delete', $item->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
</main>
@endsection
