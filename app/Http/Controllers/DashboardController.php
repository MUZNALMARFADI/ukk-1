<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPembayaran = Pembayaran::sum('jumlah_bayar');
        $pembayaranTerbaru = Pembayaran::with('siswa.kelas')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalSiswa',
            'totalKelas',
            'totalPembayaran',
            'pembayaranTerbaru'
        ));
    }
}