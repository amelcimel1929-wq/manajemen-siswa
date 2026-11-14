@extends('nilai.index')
@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Data Nilai Siswa</h1>
            <p class="subtitle">Kelola dan pantau nilai hasil belajar siswa (Halaman Guru).</p>
        </div>
        <a href="{{ route('admin.nilai.tambah') }}" class="btn btn-primary">
            + Tambah Nilai
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
                        <th>Nama Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Jurusan</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="daftarProduk">
                    @forelse ($nilai ?? $produk as $item)
                    <tr data-nama="{{ $item->nama_siswa }} {{ $item->mata_pelajaran }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->mata_pelajaran }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td><strong>{{ $item->nilai }}</strong></td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('admin.nilai.edit', $item->id) }}">Edit</a>
                            <form action="{{ route('admin.nilai.delete', $item->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--muted); padding: 24px;">Belum ada data nilai. Silakan tambahkan nilai siswa baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
