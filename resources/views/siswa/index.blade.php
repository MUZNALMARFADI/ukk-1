@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Data Siswa</h2>

        <a href="{{ route('siswa.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            + Tambah Siswa
        </a>
    </div>

    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-indigo-600 text-white">
            <tr>
                <th class="px-6 py-3 text-left">NISN</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Kelas</th>
                <th class="px-6 py-3 text-left">Jurusan</th>
                <th class="px-6 py-3 text-left">Alamat</th>
                <th class="px-6 py-3 text-left">Telepon</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">

            @foreach($siswa as $s)
            <tr>
                <td class="px-6 py-4">{{ $s->nisn }}</td>
                <td class="px-6 py-4">{{ $s->nama }}</td>
                <td class="px-6 py-4">{{ $s->kelas }}</td>
                <td class="px-6 py-4">{{ $s->jurusan }}</td>
                <td class="px-6 py-4">{{ $s->alamat }}</td>
                <td class="px-6 py-4">{{ $s->telepon }}</td>

                <td class="px-6 py-4 text-center">
                    <a href="{{ route('siswa.edit',$s->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                        Edit
                    </a>

                    <form action="{{ route('siswa.destroy',$s->id) }}" method="POST" class="inline">
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
