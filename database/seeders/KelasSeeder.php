<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar jurusan / kompetensi
        $kompetensi = [
            'Rekayasa Perangkat Lunak',
            'Desain Komunikasi Visual',
            'Teknik Komputer dan Jaringan',
            'Mekatronika',
            'Teknik Body Otomotif',
            'Teknik Pengelasan',
            'Teknik Bodi Kendaraan Ringan',
            'Teknik Permesinan',
            'Agribisnis Tanaman Pangan dan Hortikultura',
            'Agribisnis Pengolahan Hasil Pertanian'
        ];

        // Tingkatan kelas
        $tingkat = [
            'Kelas 10',
            'Kelas 11',
            'Kelas 12'
        ];

        // Setiap tingkat punya 1–3 rombel
        foreach ($tingkat as $t) {
            foreach ($kompetensi as $k) {
                for ($i = 1; $i <= 3; $i++) {
                    Kelas::create([
                        'nama_kelas' => $t . ' ' . $k . ' ' . $i,
                        'kompetensi' => $k
                    ]);
                }
            }
        }
    }
}
