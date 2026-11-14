@extends('data diri.index')
@section('content')
<main class="main">
            <header class="page-header">
                <div>
                    <h1>Data Diri</h1>
                    <p class="subtitle">Kelola data diri siswa Anda.</p>
                </div>
                <a href="{{ route('admin.data-diri.tambah') }}" class="btn btn-primary">
                    + Tambah Data Diri
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
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="daftarProduk">
                            @foreach ($dataDiri ?? $produk as $item)
                            <tr data-nama="{{ $item->nama }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('admin.data-diri.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('admin.data-diri.delete', $item->id) }}" method="post" style="display: inline-block;">
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
