<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            History Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-lg shadow">
                <table class="w-full border">
                    <tr class="bg-gray-100">
                        <th class="p-2">Nama</th>
                        <th class="p-2">Kelas</th>
                        <th class="p-2">Jumlah</th>
                        <th class="p-2">Tanggal</th>
                    </tr>

                    @foreach ($history as $h)
                    <tr class="border">
                        <td class="p-2">{{ $h->siswa->nama }}</td>
                        <td class="p-2">{{ $h->siswa->nama_kelas }}</td>
                        <td class="p-2">Rp {{ number_format($h->jumlah_bayar) }}</td>
                        <td class="p-2">{{ $h->tgl_bayar }}</td>
                    </tr>
                    @endforeach
                </table>

                @if ($history->count() == 0)
                <p class="text-center text-gray-500 mt-3">Belum ada history pembayaran</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>