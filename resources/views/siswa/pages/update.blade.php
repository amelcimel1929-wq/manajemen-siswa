@extends('siswa.index')
@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Update Data Siswa</h1>
            <p class="subtitle">Perbarui informasi data siswa (Halaman Guru).</p>
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
        <form id="formUpdate" action="{{ route('admin.siswa.update', ($siswa ?? $produk)->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="siswaId" value="{{ ($siswa ?? $produk)->id }}">

            <div class="form-group">
                <label for="nik">
                    NIK <span class="required">*</span>
                </label>
                <input type="text" id="nik" name="nik" value="{{ old('nik', ($siswa ?? $produk)->nik) }}" required>
            </div>

            <div class="form-group">
                <label for="nama">
                    Nama Siswa <span class="required">*</span>
                </label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', ($siswa ?? $produk)->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="kelas">
                    Kelas <span class="required">*</span>
                </label>
                <input type="text" id="kelas" name="kelas" value="{{ old('kelas', ($siswa ?? $produk)->kelas) }}" required>
            </div>

            <div class="form-group">
                <label for="jurusan">
                    Jurusan <span class="required">*</span>
                </label>
                <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', ($siswa ?? $produk)->jurusan) }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">
                    Alamat <span class="required">*</span>
                </label>
                <textarea id="alamat" name="alamat" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" required>{{ old('alamat', ($siswa ?? $produk)->alamat) }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.siswa.table') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    Update Data Siswa
                </button>
            </div>
        </form>
    </section>
</main>
@endsection
