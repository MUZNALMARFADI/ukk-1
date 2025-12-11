<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spp;

class SppSeeder extends Seeder
{
    public function run(): void
    {
        // Normal
        Spp::create([
            'tahun'   => 2025,
            'nominal' => 175000,
            'kategori' => 'Normal'
        ]);

        // Bantuan Desa
        Spp::create([
            'tahun'   => 2025,
            'nominal' => 100000,
            'kategori' => 'Bantuan Desa'
        ]);

        // Orang Tua Meninggal
        Spp::create([
            'tahun'   => 2025,
            'nominal' => 75000,
            'kategori' => 'Orang Tua Meninggal'
        ]);

        // Bantuan Pemerintah
        Spp::create([
            'tahun'   => 2025,
            'nominal' => 75000,
            'kategori' => 'Bantuan Pemerintah'
        ]);
    }
}
