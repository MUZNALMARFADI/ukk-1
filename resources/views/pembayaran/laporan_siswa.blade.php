@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    <h2 class="text-xl font-bold mb-2">Laporan Pembayaran Siswa</h2>

    <p class="text-lg font-semibold">Nama: {{ $siswa->nama }}</p>
    <p class="mb-4">Kelas: {{ $siswa->nama_kelas }}</p>

    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2">Jumlah Bayar</th>
                <th class="px-4 py-2">Tanggal</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($riwayat as $p)
            <tr>
                <td class="px-4 py-2">Rp {{ number_format($p->jumlah_bayar) }}</td>
                <td class="px-4 py-2">{{ $p->tgl_bayar }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center py-4 text-gray-500">
                    Belum ada riwayat pembayaran.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection