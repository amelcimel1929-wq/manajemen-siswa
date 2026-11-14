@extends('nilai.index')
@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Update Nilai Siswa</h1>
            <p class="subtitle">Perbarui data nilai hasil belajar siswa.</p>
        </div>
    </header>

    @if ($errors->any())
        <div class="alert" style="background-color: #fee2e2; color: #b91c1c; border-color: #fca5a5;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="card form-card">
        <form id="formUpdate" action="{{ route('admin.nilai.update', ($nilai ?? $produk)->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="nilaiId" value="{{ ($nilai ?? $produk)->id }}">

            <div class="form-group">
                <label for="nama_siswa">
                    Nama Siswa <span class="required">*</span>
                </label>
                <input type="text" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', ($nilai ?? $produk)->nama_siswa) }}" required>
            </div>

            <div class="form-group">
                <label for="mata_pelajaran">
                    Mata Pelajaran <span class="required">*</span>
                </label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', ($nilai ?? $produk)->mata_pelajaran) }}" required>
            </div>

            <div class="form-group">
                <label for="jurusan">
                    Jurusan <span class="required">*</span>
                </label>
                <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', ($nilai ?? $produk)->jurusan) }}" required>
            </div>

            <div class="form-group">
                <label for="nilai">
                    Nilai Angka (0 - 100) <span class="required">*</span>
                </label>
                <input type="number" id="nilai" name="nilai" min="0" max="100" value="{{ old('nilai', ($nilai ?? $produk)->nilai) }}" required>
            </div>

            <div class="form-group">
                <label for="keterangan">
                    Keterangan <span class="required">*</span>
                </label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', ($nilai ?? $produk)->keterangan) }}" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.nilai.table') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    Update Nilai
                </button>
            </div>
        </form>
    </section>
</main>
@endsection
