<?php

namespace Database\Seeders;

use App\Models\DataDiri;
use Illuminate\Database\Seeder;

class DataDiriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataDiri::create([
            'nis' => '10245',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);
    }
}
