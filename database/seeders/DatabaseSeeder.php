<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SppSeeder::class,
            SiswaSeeder::class,
            PetugasSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}
