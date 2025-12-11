<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 pb-10 rounded-xl shadow flex flex-col gap-6">

                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf

                    <!-- PILIH SISWA -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1">Nama Siswa</label>
                        <select name="siswa_id" class="w-full border rounded-lg p-2">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->nama }} ({{ $s->kelas->nama_kelas ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- NOMINAL -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1">Jumlah Bayar</label>
                        <input type="number" name="jumlah_bayar" class="w-full border rounded-lg p-2"
                            placeholder="Masukkan jumlah">
                    </div>

                    <!-- TANGGAL BAYAR -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1">Tanggal Bayar</label>
                        <input type="date" name="tgl_bayar" class="w-full border rounded-lg p-2">
                    </div>

                    <!-- =========================== -->
                    <!--       TOMBOL BAYAR           -->
                    <!-- =========================== -->
                    <div class="mt-4 text-center">
                        <button type="submit"
                                class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
                            💰 BAYAR
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
