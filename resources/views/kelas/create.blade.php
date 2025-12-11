@extends('layouts.layout')

@section('content')

<div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">

    <h2 class="text-xl font-bold mb-4">Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <label class="block font-semibold">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="w-full p-2 border rounded mb-4" required>

        <label class="block font-semibold">Kompetensi Keahlian</label>
        <input type="text" name="kompetensi" class="w-full p-2 border rounded mb-4" required>

        <button class="bg-indigo-600 px-4 py-2 text-white rounded-md">Simpan</button>
    </form>

</div>

@endsection
