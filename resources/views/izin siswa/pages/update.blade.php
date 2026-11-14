@extends('izin siswa.index')
@section('content')
 <main class="main">
            <header class="page-header">
                <div>
                    <h1>Update Izin Siswa</h1>
                    <p class="subtitle">Perbarui informasi izin siswa.</p>
                </div>
            </header>

            <section class="card form-card">
                <form id="formUpdate" action="{{ route('admin.izin-siswa.update', ($izinSiswa ?? $produk)->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="izinSiswaId" value="{{ ($izinSiswa ?? $produk)->id }}">

                    <div class="form-group">
                        <label for="tanggal_awal">
                            Tanggal Awal <span class="required">*</span>
                        </label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" value="{{ \Carbon\Carbon::parse(($izinSiswa ?? $produk)->tanggal_awal)->format('Y-m-d') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_akhir">
                            Tanggal Akhir <span class="required">*</span>
                        </label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" value="{{ \Carbon\Carbon::parse(($izinSiswa ?? $produk)->tanggal_akhir)->format('Y-m-d') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">
                            Keterangan <span class="required">*</span>
                        </label>
                        <textarea id="keterangan" name="keterangan" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" required>{{ ($izinSiswa ?? $produk)->keterangan }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.izin-siswa.table') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            Update Izin Siswa
                        </button>
                    </div>
                </form>
            </section>
        </main>
@endsection
