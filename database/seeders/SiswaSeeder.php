<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::first(); // X RPL 1

        $users = User::where('role', 'siswa')->get();

        foreach ($users as $user) {
            Siswa::create([
                'nisn' => rand(1000000000, 9999999999),
                'nama' => $user->name,
                'kelas_id' => $kelas->id,
                'alamat' => 'Jl. Mawar No. ' . rand(1, 30),
                'telepon' => '0812' . rand(1000000, 9999999),
                'user_id' => $user->id
            ]);
        }
    }
}
