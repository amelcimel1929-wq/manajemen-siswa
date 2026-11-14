@extends('data diri.index')
@section('content')
        <main class="main">
            <header class="page-header">
                <div>
                    <h1>Tambah Data Diri</h1>
                    <p class="subtitle">Masukkan informasi data diri siswa baru.</p>
                </div>
            </header>

            <section class="card form-card">
                <form id="formTambah" method="POST" action="{{ route('admin.data-diri.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nis">
                            NIS <span class="required">*</span>
                        </label>
                        <input type="text" id="nis" name="nis" placeholder="Contoh: 10245" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">
                            Nama <span class="required">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" placeholder="Contoh: Ahmad Fauzi" required>
                    </div>

                    <div class="form-group">
                        <label for="kelas">
                            Kelas <span class="required">*</span>
                        </label>
                        <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII RPL 1" required>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">
                            Jurusan <span class="required">*</span>
                        </label>
                        <input type="text" id="jurusan" name="jurusan" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">
                            Alamat <span class="required">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" placeholder="Contoh: Jl. Merdeka No. 10" required></textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.data-diri.table') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            Simpan Data Diri
                        </button>
                    </div>
                </form>
            </section>
        </main>
@endsection
