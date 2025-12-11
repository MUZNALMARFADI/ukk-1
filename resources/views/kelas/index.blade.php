@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Data Kelas</h2>

        <a href="{{ route('kelas.create') }}" 
           class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            + Tambah Kelas
        </a>
    </div>

    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-indigo-600 text-white">
            <tr>
                <th class="px-6 py-3 text-left">Nama Kelas</th>
                <th class="px-6 py-3 text-left">Kompetensi</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @foreach($kelas as $k)
            <tr>
                <td class="px-6 py-3">{{ $k->nama_kelas }}</td>
                <td class="px-6 py-3">{{ $k->kompetensi }}</td>

                <td class="px-6 py-3 text-center">

                    <a href="{{ route('kelas.edit', $k->id) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                        Edit
                    </a>

                    <form action="{{ route('kelas.destroy',$k->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
