<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // LIST PEMBAYARAN (ADMIN)
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa')
            ->latest()
            ->paginate(10);

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('pembayaran.create', compact('siswa'));
    }

    // SIMPAN PEMBAYARAN
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'jumlah_bayar' => 'required|numeric|min:1000',
            'tgl_bayar' => 'required|date'
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan');
    }

    // HISTORY PEMBAYARAN SISWA (khusus siswa login)
    public function history()
    {
        $history = Pembayaran::where('siswa_id', auth()->user()->siswa_id ?? 0)
            ->with('siswa.kelas')
            ->get();

        return view('pembayaran.history', compact('history'));
    }

    /* ======================================
        📌 LAPORAN PEMBAYARAN (ADMIN)
       ====================================== */

    // LAPORAN SEMUA PEMBAYARAN
    public function laporan()
    {
        $laporan = Pembayaran::with('siswa.kelas')
            ->orderBy('tgl_bayar', 'DESC')
            ->get();

        return view('pembayaran.laporan', compact('laporan'));
    }

    // LAPORAN PER SISWA
    public function laporanPerSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);

        $riwayat = Pembayaran::where('siswa_id', $id)
            ->with('siswa.kelas')
            ->orderBy('tgl_bayar', 'DESC')
            ->get();

        return view('pembayaran.laporan_siswa', compact('siswa', 'riwayat'));
    }
}
