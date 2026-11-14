@extends('siswa.index')
@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Tambah Data Siswa</h1>
            <p class="subtitle">Masukkan informasi data siswa baru (Halaman Guru).</p>
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
        <form id="formTambah" method="POST" action="{{ route('admin.siswa.store') }}">
            @csrf
            <div class="form-group">
                <label for="nik">
                    NIK <span class="required">*</span>
                </label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Contoh: 3201234567890001" required>
            </div>

            <div class="form-group">
                <label for="nama">
                    Nama Siswa <span class="required">*</span>
                </label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso" required>
            </div>

            <div class="form-group">
                <label for="kelas">
                    Kelas <span class="required">*</span>
                </label>
                <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XII RPL 1" required>
            </div>

            <div class="form-group">
                <label for="jurusan">
                    Jurusan <span class="required">*</span>
                </label>
                <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
            </div>

            <div class="form-group">
                <label for="alamat">
                    Alamat <span class="required">*</span>
                </label>
                <textarea id="alamat" name="alamat" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" placeholder="Contoh: Jl. Merdeka No. 10" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.siswa.table') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    Simpan Data Siswa
                </button>
            </div>
        </form>
    </section>
</main>
@endsection
