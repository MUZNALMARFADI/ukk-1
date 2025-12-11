@extends('layouts.layout')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">

    <h2 class="text-xl font-semibold mb-4">Edit Siswa</h2>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block font-semibold mb-1">NISN</label>
        <input type="text" name="nisn" class="w-full p-2 border rounded-md mb-4"
               value="{{ $siswa->nisn }}" required>

        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama" class="w-full p-2 border rounded-md mb-4"
               value="{{ $siswa->nama }}" required>

        <!-- DROPDOWN KELAS (STRING) -->
        <label class="block font-semibold mb-1">Kelas</label>
        <select name="kelas_id" class="w-full p-2 border rounded-md mb-4" required>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>


        <!-- DROPDOWN JURUSAN -->
        <label class="block font-semibold mb-1">Jurusan</label>
        <select name="jurusan" class="w-full p-2 border rounded-md mb-4" required>
            <option value="RPL"  {{ $siswa->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
            <option value="DKV"  {{ $siswa->jurusan == 'DKV' ? 'selected' : '' }}>DKV</option>
            <option value="TKJ"  {{ $siswa->jurusan == 'TKJ' ? 'selected' : '' }}>TKJ</option>
            <option value="MKT"  {{ $siswa->jurusan == 'MKT' ? 'selected' : '' }}>MKT</option>
            <option value="TPBO" {{ $siswa->jurusan == 'TPBO' ? 'selected' : '' }}>TPBO</option>
            <option value="TL"   {{ $siswa->jurusan == 'TL' ? 'selected' : '' }}>TL</option>
            <option value="TBKR" {{ $siswa->jurusan == 'TBKR' ? 'selected' : '' }}>TBKR</option>
            <option value="TPM"  {{ $siswa->jurusan == 'TPM' ? 'selected' : '' }}>TPM</option>
            <option value="ATPH" {{ $siswa->jurusan == 'ATPH' ? 'selected' : '' }}>ATPH</option>
            <option value="APHP" {{ $siswa->jurusan == 'APHP' ? 'selected' : '' }}>APHP</option>
        </select>

        <label class="block font-semibold mb-1">Telepon</label>
        <input type="text" name="telepon" class="w-full p-2 border rounded-md mb-4"
               value="{{ $siswa->telepon }}">

        <label class="block font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="w-full p-2 border rounded-md mb-4">{{ $siswa->alamat }}</textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            Update
        </button>

    </form>

</div>

@endsection
