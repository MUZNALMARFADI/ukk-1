@extends('layouts.layout')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">

    <h2 class="text-xl font-semibold mb-4">Tambah Siswa</h2>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <label class="block font-semibold mb-1">NISN</label>
        <input type="text" name="nisn" class="w-full p-2 border rounded-md mb-4" required>

        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama" class="w-full p-2 border rounded-md mb-4" required>

        <!-- KELAS -->
        <label class="block font-semibold mb-1">Kelas</label>
        <select name="kelas_id" class="w-full p-2 border rounded-md mb-4" required>
            <option value="">-- Pilih Kelas --</option>

            @foreach ($kelas as $k)
                <option value="{{ $k->id }}">
                    {{ $k->nama_kelas }}     {{-- Misal: X, XI, XII --}}
                </option>
            @endforeach

        </select>

        <!-- DROPDOWN JURUSAN -->
        <label class="block font-semibold mb-1">Jurusan</label>
        <select name="jurusan" class="w-full p-2 border rounded-md mb-4" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="RPL">RPL</option>
            <option value="DKV">DKV</option>
            <option value="TKJ">TKJ</option>
            <option value="MKT">MKT</option>
            <option value="TPBO">TPBO</option>
            <option value="TL">TL</option>
            <option value="TBKR">TBKR</option>
            <option value="TPM">TPM</option>
            <option value="ATPH">ATPH</option>
            <option value="APHP">APHP</option>
        </select>

        <label class="block font-semibold mb-1">Telepon</label>
        <input type="text" name="telepon" class="w-full p-2 border rounded-md mb-4">

        <label class="block font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="w-full p-2 border rounded-md mb-4"></textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            Simpan
        </button>
    </form>

</div>

@endsection