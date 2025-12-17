@extends('layouts.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg">

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📚 Data Siswa</h2>

        <a href="{{ route('siswa.create') }}" 
           class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-700 transition shadow-md flex items-center gap-2">
            <span class="text-xl">+</span> Tambah Siswa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">NISN</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama</th>
                    <th class="px-6 py-4 text-center font-semibold">Kelas</th>
                    <th class="px-6 py-4 text-left font-semibold">Jurusan</th>
                    <th class="px-6 py-4 text-left font-semibold">Telepon</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @forelse($siswa as $s)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-700">{{ $s->nisn }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $s->nama }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-4 py-1.5 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold">
                            {{ $s->tingkat }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $s->jurusan }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $s->telepon ?? '-' }}</td>

                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('siswa.edit',$s->id) }}" 
                               class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500 transition shadow">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('siswa.destroy',$s->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus siswa {{ $s->nama }}?')"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition shadow">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">
                        <div class="text-6xl mb-3">📭</div>
                        <p class="text-lg">Belum ada data siswa</p>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $siswa->links() }}
    </div>

</div>
@endsection