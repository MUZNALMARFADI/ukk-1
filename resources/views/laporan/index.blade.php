<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Laporan Pembayaran</h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow rounded-lg">
            <form action="{{ route('laporan.cari') }}" method="POST">
                @csrf

                <label class="block mb-2">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="border p-2 rounded w-full mb-4">

                <label class="block mb-2">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="border p-2 rounded w-full mb-4">

                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Tampilkan Laporan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
