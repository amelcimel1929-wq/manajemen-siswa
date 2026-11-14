<?php

namespace Database\Seeders;

use App\Models\IzinSiswa;
use Illuminate\Database\Seeder;

class IzinSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IzinSiswa::create([
            'tanggal_awal' => '2026-11-14',
            'tanggal_akhir' => '2026-11-16',
            'keterangan' => 'Sakit demam rawat jalan',
        ]);
    }
}
