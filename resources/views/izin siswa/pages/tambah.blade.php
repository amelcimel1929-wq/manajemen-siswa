@extends('izin siswa.index')
@section('content')
        <main class="main">
            <header class="page-header">
                <div>
                    <h1>Tambah Izin Siswa</h1>
                    <p class="subtitle">Masukkan informasi izin siswa baru.</p>
                </div>
            </header>

            <section class="card form-card">
                <form id="formTambah" method="POST" action="{{ route('admin.izin-siswa.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_awal">
                            Tanggal Awal <span class="required">*</span>
                        </label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_akhir">
                            Tanggal Akhir <span class="required">*</span>
                        </label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">
                            Keterangan <span class="required">*</span>
                        </label>
                        <textarea id="keterangan" name="keterangan" rows="4" style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit;" placeholder="Contoh: Sakit demam rawat jalan" required></textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.izin-siswa.table') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            Simpan Izin Siswa
                        </button>
                    </div>
                </form>
            </section>
        </main>
@endsection
