<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Hasil Laporan Pembayaran</h2>
    </x-slot>

    <div class="p-6 max-w-6xl mx-auto">

        <a href="{{ route('laporan.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            &larr; Kembali
        </a>

        <div class="bg-white p-6 shadow rounded-lg mt-4">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Nama Siswa</th>
                        <th class="p-2 border">Kelas</th>
                        <th class="p-2 border">Jumlah Bayar</th>
                        <th class="p-2 border">Tanggal Bayar</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pembayaran as $p)
                    <tr>
                        <td class="p-2 border">{{ $p->siswa->nama }}</td>
                        <td class="p-2 border">{{ $p->siswa->kelas->nama_kelas }}</td>
                        <td class="p-2 border">Rp {{ number_format($p->jumlah_bayar) }}</td>
                        <td class="p-2 border">{{ $p->tgl_bayar }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">Tidak ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</x-app-layout>
