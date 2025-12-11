<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $siswaList = Siswa::all();
        $petugas = User::where('role', 'petugas')->first();
        $spp = Spp::find(2); // Tahun 2025

        foreach ($siswaList as $siswa) {
            Pembayaran::create([
                'siswa_id' => $siswa->id,
                'petugas_id' => $petugas->id,
                'spp_id' => $spp->id,
                'tgl_bayar' => now(),
                'bulan_dibayar' => 'Januari',
                'jumlah_bayar' => 300000,
                'keterangan' => 'Pembayaran pertama'
            ]);
        }
    }
}