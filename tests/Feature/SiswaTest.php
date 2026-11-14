<?php

namespace Tests\Feature;

use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_siswa_table(): void
    {
        Siswa::create([
            'nik' => '3201234567890001',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->get(route('admin.siswa.table'));

        $response->assertStatus(200);
        $response->assertSee('Budi Santoso');
        $response->assertSee('3201234567890001');
    }

    public function test_can_display_tambah_siswa_page(): void
    {
        $response = $this->get(route('admin.siswa.tambah'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Data Siswa');
    }

    public function test_can_store_new_siswa(): void
    {
        $response = $this->post(route('admin.siswa.store'), [
            'nik' => '3201234567890002',
            'nama' => 'Siti Aminah',
            'kelas' => 'XII RPL 2',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Sudirman No. 20',
        ]);

        $response->assertRedirect(route('admin.siswa.table'));
        $this->assertDatabaseHas('siswa', [
            'nik' => '3201234567890002',
            'nama' => 'Siti Aminah',
        ]);
    }

    public function test_can_display_edit_siswa_page(): void
    {
        $siswa = Siswa::create([
            'nik' => '3201234567890001',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->get(route('admin.siswa.edit', $siswa->id));

        $response->assertStatus(200);
        $response->assertSee('Update Data Siswa');
        $response->assertSee('Budi Santoso');
    }

    public function test_can_update_siswa(): void
    {
        $siswa = Siswa::create([
            'nik' => '3201234567890001',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->put(route('admin.siswa.update', $siswa->id), [
            'nik' => '3201234567890001',
            'nama' => 'Budi Santoso Updated',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 15',
        ]);

        $response->assertRedirect(route('admin.siswa.table'));
        $this->assertDatabaseHas('siswa', [
            'id' => $siswa->id,
            'nama' => 'Budi Santoso Updated',
        ]);
    }

    public function test_can_delete_siswa(): void
    {
        $siswa = Siswa::create([
            'nik' => '3201234567890001',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->delete(route('admin.siswa.delete', $siswa->id));

        $response->assertRedirect(route('admin.siswa.table'));
        $this->assertDatabaseMissing('siswa', [
            'id' => $siswa->id,
        ]);
    }
}
