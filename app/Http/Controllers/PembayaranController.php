<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa')
            ->latest()
            ->paginate(10);

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('pembayaran.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah_bayar' => 'required|numeric|min:1000',
            'tgl_bayar' => 'required|date'
        ]);

        // Ambil SPP default
        $spp = \App\Models\Spp::where('tahun', 2025)
                              ->where('kategori', 'Normal')
                              ->first();

        // Hitung bulan
        $bulan = Carbon::parse($request->tgl_bayar)->format('F');

        Pembayaran::create([
            'siswa_id' => $request->siswa_id,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tgl_bayar' => $request->tgl_bayar,
            'petugas_id' => auth()->id(),
            'spp_id' => $spp ? $spp->id : 1,
            'bulan_dibayar' => $bulan
        ]);

        return redirect()->route('pembayaran.history')
            ->with('success', 'Pembayaran berhasil ditambahkan! 💰');
    }

    public function history()
    {
        // Cari siswa berdasarkan user_id yang login
        $siswa = Siswa::where('user_id', auth()->id())->first();

        if ($siswa) {
            // Jika user adalah siswa, tampilkan history pembayaran siswa tersebut
            $history = Pembayaran::where('siswa_id', $siswa->id)
                ->with('siswa')
                ->latest()
                ->get();
        } else {
            // Jika bukan siswa (admin/petugas), tampilkan semua
            $history = Pembayaran::with('siswa')
                ->latest()
                ->get();
        }

        return view('pembayaran.history', compact('history'));
    }

    public function laporan()
    {
        $laporan = Pembayaran::with('siswa')
            ->orderBy('tgl_bayar', 'DESC')
            ->get();

        return view('pembayaran.laporan', compact('laporan'));
    }

    public function laporanPerSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);

        $riwayat = Pembayaran::where('siswa_id', $id)
            ->with('siswa')
            ->orderBy('tgl_bayar', 'DESC')
            ->get();

        return view('pembayaran.laporan_siswa', compact('siswa', 'riwayat'));
    }
}