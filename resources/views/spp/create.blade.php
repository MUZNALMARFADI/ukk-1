@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">

    <h2 class="text-xl font-semibold mb-4">Tambah SPP</h2>

    <form action="{{ route('spp.store') }}" method="POST">
        @csrf

        <label class="block font-semibold mb-1">Tahun</label>
        <input type="number" name="tahun" class="w-full p-2 border rounded-md mb-4" required>

        <label class="block font-semibold mb-1">Kategori</label>
        <input type="text" name="kategori" class="w-full p-2 border rounded-md mb-4" required>

        <label class="block font-semibold mb-1">Nominal</label>
        <input type="number" name="nominal" class="w-full p-2 border rounded-md mb-4" required>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Simpan
        </button>
    </form>

</div>
@endsection