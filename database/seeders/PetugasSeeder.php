<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Petugas 2',
            'username' => 'petugas2',
            'email' => 'petugas2@example.com',
            'password' => bcrypt('123456'),
            'role' => 'petugas'
        ]);
    }
}