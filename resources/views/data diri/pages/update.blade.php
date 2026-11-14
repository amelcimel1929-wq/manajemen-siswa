@extends('data diri.index')
@section('content')
 <main class="main">
            <header class="page-header">
                <div>
                    <h1>Update Data Diri</h1>
                    <p class="subtitle">Perbarui informasi data diri Anda.</p>
                </div>
            </header>

            <section class="card form-card">
                <form id="formUpdate" action="{{ route('admin.data-diri.update', ($dataDiri ?? $produk)->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="dataDiriId" value="{{ ($dataDiri ?? $produk)->id }}">

                    <div class="form-group">
                        <label for="nis">
                            NIS <span class="required">*</span>
                        </label>
                        <input type="text" id="nis" name="nis" value="{{ ($dataDiri ?? $produk)->nis }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">
                            Nama <span class="required">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ ($dataDiri ?? $produk)->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kelas">
                            Kelas <span class="required">*</span>
                        </label>
                        <input type="text" id="kelas" name="kelas" value="{{ ($dataDiri ?? $produk)->kelas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">
                            Jurusan <span class="required">*</span>
                        </label>
                        <input type="text" id="jurusan" name="jurusan" value="{{ ($dataDiri ?? $produk)->jurusan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">
                            Alamat <span class="required">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" required>{{ ($dataDiri ?? $produk)->alamat }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.data-diri.table') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            Update Data Diri
                        </button>
                    </div>
                </form>
            </section>
        </main>
@endsection
