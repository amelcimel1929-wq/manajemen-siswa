<?php

namespace Tests\Feature;

use App\Models\IzinSiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IzinSiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_izin_siswa_table(): void
    {
        IzinSiswa::create([
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-16',
            'keterangan' => 'Sakit demam',
        ]);

        $response = $this->get(route('admin.izin-siswa.table'));

        $response->assertStatus(200);
        $response->assertSee('Sakit demam');
    }

    public function test_can_display_tambah_izin_siswa_page(): void
    {
        $response = $this->get(route('admin.izin-siswa.tambah'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Izin Siswa');
    }

    public function test_can_store_new_izin_siswa(): void
    {
        $response = $this->post(route('admin.izin-siswa.store'), [
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-15',
            'keterangan' => 'Keperluan keluarga',
        ]);

        $response->assertRedirect(route('admin.izin-siswa.table'));
        $this->assertDatabaseHas('izin_siswa', [
            'keterangan' => 'Keperluan keluarga',
        ]);
    }

    public function test_can_display_edit_izin_siswa_page(): void
    {
        $izinSiswa = IzinSiswa::create([
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-16',
            'keterangan' => 'Sakit demam',
        ]);

        $response = $this->get(route('admin.izin-siswa.edit', $izinSiswa->id));

        $response->assertStatus(200);
        $response->assertSee('Update Izin Siswa');
        $response->assertSee('Sakit demam');
    }

    public function test_can_update_izin_siswa(): void
    {
        $izinSiswa = IzinSiswa::create([
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-16',
            'keterangan' => 'Sakit demam',
        ]);

        $response = $this->put(route('admin.izin-siswa.update', $izinSiswa->id), [
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-17',
            'keterangan' => 'Sakit demam berdarah',
        ]);

        $response->assertRedirect(route('admin.izin-siswa.table'));
        $this->assertDatabaseHas('izin_siswa', [
            'id' => $izinSiswa->id,
            'keterangan' => 'Sakit demam berdarah',
        ]);
    }

    public function test_can_delete_izin_siswa(): void
    {
        $izinSiswa = IzinSiswa::create([
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-16',
            'keterangan' => 'Sakit demam',
        ]);

        $response = $this->delete(route('admin.izin-siswa.delete', $izinSiswa->id));

        $response->assertRedirect(route('admin.izin-siswa.table'));
        $this->assertDatabaseMissing('izin_siswa', [
            'id' => $izinSiswa->id,
        ]);
    }
}
