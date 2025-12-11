@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">

    <h2 class="text-xl font-bold mb-4">Edit Kelas</h2>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Nama Kelas</label>
            <input type="text" name="nama_kelas" 
                   value="{{ $kelas->nama_kelas }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Kompetensi Keahlian</label>
            <input type="text" name="kompetensi" 
                   value="{{ $kelas->kompetensi }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Update
        </button>
    </form>

</div>
@endsection
