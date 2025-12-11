<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function cari(Request $request)
    {
        $request->validate([
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date'
        ]);

        $pembayaran = Pembayaran::whereBetween('tgl_bayar', [
                $request->tgl_awal,
                $request->tgl_akhir
            ])
            ->with('siswa.kelas')
            ->orderBy('tgl_bayar', 'ASC')
            ->get();

        return view('laporan.hasil', compact('pembayaran'));
    }
}
