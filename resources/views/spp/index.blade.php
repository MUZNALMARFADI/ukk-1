@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Data SPP</h2>

        <a href="{{ route('spp.create') }}" 
           class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            + Tambah SPP
        </a>
    </div>

    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-indigo-600 text-white">
            <tr>
                <th class="px-6 py-3 text-left">Tahun</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Nominal</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @foreach($spp as $s)
            <tr>
                <td class="px-6 py-4">{{ $s->tahun }}</td>
                <td class="px-6 py-4">{{ $s->kategori }}</td>
                <td class="px-6 py-4">Rp {{ number_format($s->nominal, 0, ',', '.') }}</td>

                <td class="px-6 py-4 text-center">
                    <a href="{{ route('spp.edit', $s->id) }}" 
                       class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                        Edit
                    </a>

                    <form action="{{ route('spp.destroy', $s->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600"
                                onclick="return confirm('Hapus data SPP ini?')">
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