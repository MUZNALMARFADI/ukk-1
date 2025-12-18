@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    <h2 class="text-xl font-bold mb-4">Laporan Semua Pembayaran</h2>

    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2 text-left">Nama Siswa</th>
                <th class="px-4 py-2 text-left">Kelas</th>
                <th class="px-4 py-2 text-left">Jumlah Bayar</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($laporan as $p)
            <tr>
                <td class="px-4 py-2">{{ $p->siswa->nama }}</td>
                <td class="px-4 py-2">{{ $p->siswa->nama_kelas }}</td>
                <td class="px-4 py-2">Rp {{ number_format($p->jumlah_bayar) }}</td>
                <td class="px-4 py-2">{{ $p->tgl_bayar }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4 text-gray-500">
                    Tidak ada data pembayaran.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection