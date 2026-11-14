<?php

namespace Tests\Feature;

use App\Models\DataDiri;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataDiriTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_data_diri_table(): void
    {
        DataDiri::create([
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->get(route('admin.data-diri.table'));

        $response->assertStatus(200);
        $response->assertSee('Ahmad Fauzi');
    }

    public function test_can_display_tambah_data_diri_page(): void
    {
        $response = $this->get(route('admin.data-diri.tambah'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Data Diri');
    }

    public function test_can_store_new_data_diri(): void
    {
        $response = $this->post(route('admin.data-diri.store'), [
            'nis' => '10246',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL 2',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Pahlawan No. 5',
        ]);

        $response->assertRedirect(route('admin.data-diri.table'));
        $this->assertDatabaseHas('data_diri', [
            'nis' => '10246',
            'nama' => 'Budi Santoso',
        ]);
    }

    public function test_can_display_edit_data_diri_page(): void
    {
        $dataDiri = DataDiri::create([
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->get(route('admin.data-diri.edit', $dataDiri->id));

        $response->assertStatus(200);
        $response->assertSee('Update Data Diri');
        $response->assertSee('Ahmad Fauzi');
    }

    public function test_can_update_data_diri(): void
    {
        $dataDiri = DataDiri::create([
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->put(route('admin.data-diri.update', $dataDiri->id), [
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi Updated',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 20',
        ]);

        $response->assertRedirect(route('admin.data-diri.table'));
        $this->assertDatabaseHas('data_diri', [
            'id' => $dataDiri->id,
            'nama' => 'Ahmad Fauzi Updated',
        ]);
    }

    public function test_can_delete_data_diri(): void
    {
        $dataDiri = DataDiri::create([
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response = $this->delete(route('admin.data-diri.delete', $dataDiri->id));

        $response->assertRedirect(route('admin.data-diri.table'));
        $this->assertDatabaseMissing('data_diri', [
            'id' => $dataDiri->id,
        ]);
    }
}
