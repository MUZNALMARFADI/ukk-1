<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $jurusanList = [
            'Rekayasa Perangkat Lunak',
            'Desain Komunikasi Visual',
            'Teknik Komputer dan Jaringan',
        ];

        $users = User::where('role', 'siswa')->get();

        foreach ($users as $key => $user) {
            Siswa::create([
                'nisn' => '202500000' . ($key + 1),
                'nama' => $user->name,
                'tingkat' => ['X', 'XI', 'XII'][array_rand(['X', 'XI', 'XII'])],
                'jurusan' => $jurusanList[array_rand($jurusanList)],
                'alamat' => 'Jl. Mawar No. ' . rand(1, 30),
                'telepon' => '0812' . rand(1000000, 9999999),
                'user_id' => $user->id
            ]);
        }
    }
}