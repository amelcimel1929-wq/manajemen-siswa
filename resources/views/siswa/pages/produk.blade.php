@extends('siswa.index')
@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Data Siswa</h1>
            <p class="subtitle">Kelola dan lihat data seluruh siswa (Halaman Guru).</p>
        </div>
        <a href="{{ route('admin.siswa.tambah') }}" class="btn btn-primary">
            + Tambah Siswa
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
                        <th>NIK</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="daftarProduk">
                    @forelse ($siswa ?? $produk as $item)
                    <tr data-nama="{{ $item->nama }} {{ $item->kelas }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('admin.siswa.edit', $item->id) }}">Edit</a>
                            <form action="{{ route('admin.siswa.delete', $item->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--muted); padding: 24px;">Belum ada data siswa. Silakan tambahkan data siswa baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
