<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <h3 class="text-lg font-semibold">Daftar Pembayaran</h3>
               <a href="{{ route('pembayaran.create') }}" 
                class="bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-indigo-800 transition">
                + Tambah Pembayaran
                </a>

            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <table class="w-full border rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Nama Siswa</th>
                            <th class="p-2">Kelas</th>
                            <th class="p-2">Jumlah Bayar</th>
                            <th class="p-2">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pembayaran as $p)
                        <tr class="border hover:bg-gray-50">
                            <td class="p-2">{{ $p->siswa->nama }}</td>
                            <td class="p-2">{{ $p->siswa->nama_kelas }}</td>
                            <td class="p-2">Rp {{ number_format($p->jumlah_bayar) }}</td>
                            <td class="p-2">{{ $p->tgl_bayar }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center p-4 text-gray-500">
                                Belum ada pembayaran.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pembayaran->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>