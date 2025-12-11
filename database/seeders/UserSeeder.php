<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        // Petugas
        User::create([
            'name' => 'Petugas SPP',
            'username' => 'petugas',
            'email' => 'petugas@example.com',
            'password' => bcrypt('123456'),
            'role' => 'petugas'
        ]);

        // Siswa
        User::create([
            'name' => 'Budi',
            'username' => 'budi',
            'email' => 'budi@example.com',
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'Sari',
            'username' => 'sari',
            'email' => 'sari@example.com',
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'Rizki',
            'username' => 'rizki',
            'email' => 'rizki@example.com',
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);
    }
}
