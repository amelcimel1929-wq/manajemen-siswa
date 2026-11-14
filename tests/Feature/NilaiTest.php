<?php

namespace Tests\Feature;

use App\Models\Nilai;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NilaiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_nilai_table(): void
    {
        Nilai::create([
            'nama_siswa' => 'Ahmad Fauzi',
            'mata_pelajaran' => 'Matematika',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 88,
            'keterangan' => 'Tuntas',
        ]);

        $response = $this->get(route('admin.nilai.table'));

        $response->assertStatus(200);
        $response->assertSee('Ahmad Fauzi');
        $response->assertSee('Matematika');
    }

    public function test_can_display_tambah_nilai_page(): void
    {
        $response = $this->get(route('admin.nilai.tambah'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Nilai Siswa');
    }

    public function test_can_store_new_nilai(): void
    {
        $response = $this->post(route('admin.nilai.store'), [
            'nama_siswa' => 'Budi Santoso',
            'mata_pelajaran' => 'Pemrograman Web',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 90,
            'keterangan' => 'Sangat Baik',
        ]);

        $response->assertRedirect(route('admin.nilai.table'));
        $this->assertDatabaseHas('nilai', [
            'nama_siswa' => 'Budi Santoso',
            'mata_pelajaran' => 'Pemrograman Web',
            'nilai' => 90,
        ]);
    }

    public function test_can_display_edit_nilai_page(): void
    {
        $nilai = Nilai::create([
            'nama_siswa' => 'Ahmad Fauzi',
            'mata_pelajaran' => 'Matematika',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 88,
            'keterangan' => 'Tuntas',
        ]);

        $response = $this->get(route('admin.nilai.edit', $nilai->id));

        $response->assertStatus(200);
        $response->assertSee('Update Nilai Siswa');
        $response->assertSee('Ahmad Fauzi');
    }

    public function test_can_update_nilai(): void
    {
        $nilai = Nilai::create([
            'nama_siswa' => 'Ahmad Fauzi',
            'mata_pelajaran' => 'Matematika',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 88,
            'keterangan' => 'Tuntas',
        ]);

        $response = $this->put(route('admin.nilai.update', $nilai->id), [
            'nama_siswa' => 'Ahmad Fauzi',
            'mata_pelajaran' => 'Matematika Diskrit',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 95,
            'keterangan' => 'Sangat Memuaskan',
        ]);

        $response->assertRedirect(route('admin.nilai.table'));
        $this->assertDatabaseHas('nilai', [
            'id' => $nilai->id,
            'mata_pelajaran' => 'Matematika Diskrit',
            'nilai' => 95,
        ]);
    }

    public function test_can_delete_nilai(): void
    {
        $nilai = Nilai::create([
            'nama_siswa' => 'Ahmad Fauzi',
            'mata_pelajaran' => 'Matematika',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'nilai' => 88,
            'keterangan' => 'Tuntas',
        ]);

        $response = $this->delete(route('admin.nilai.delete', $nilai->id));

        $response->assertRedirect(route('admin.nilai.table'));
        $this->assertDatabaseMissing('nilai', [
            'id' => $nilai->id,
        ]);
    }
}
