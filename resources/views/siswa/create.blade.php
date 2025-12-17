@extends('layouts.layout')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-lg max-w-2xl mx-auto">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">➕ Tambah Siswa Baru</h2>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NISN -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-2">NISN <span class="text-red-500">*</span></label>
                <input type="text" name="nisn" value="{{ old('nisn') }}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Masukkan NISN" required>
            </div>

            <!-- NAMA -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Masukkan nama lengkap" required>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- KELAS/TINGKAT -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-2">Kelas <span class="text-red-500">*</span></label>
                <select name="tingkat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>

            <!-- JURUSAN -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-2">Jurusan <span class="text-red-500">*</span></label>
                <select name="jurusan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Rekayasa Perangkat Lunak" {{ old('jurusan') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                    <option value="Desain Komunikasi Visual" {{ old('jurusan') == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                    <option value="Teknik Komputer dan Jaringan" {{ old('jurusan') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                    <option value="Mekatronika" {{ old('jurusan') == 'Mekatronika' ? 'selected' : '' }}>Mekatronika</option>
                    <option value="Teknik Body Otomotif" {{ old('jurusan') == 'Teknik Body Otomotif' ? 'selected' : '' }}>Teknik Body Otomotif</option>
                    <option value="Teknik Pengelasan" {{ old('jurusan') == 'Teknik Pengelasan' ? 'selected' : '' }}>Teknik Pengelasan</option>
                    <option value="Teknik Bodi Kendaraan Ringan" {{ old('jurusan') == 'Teknik Bodi Kendaraan Ringan' ? 'selected' : '' }}>Teknik Bodi Kendaraan Ringan</option>
                    <option value="Teknik Permesinan" {{ old('jurusan') == 'Teknik Permesinan' ? 'selected' : '' }}>Teknik Permesinan</option>
                    <option value="Agribisnis Tanaman Pangan dan Hortikultura" {{ old('jurusan') == 'Agribisnis Tanaman Pangan dan Hortikultura' ? 'selected' : '' }}>Agribisnis Tanaman Pangan dan Hortikultura</option>
                    <option value="Agribisnis Pengolahan Hasil Pertanian" {{ old('jurusan') == 'Agribisnis Pengolahan Hasil Pertanian' ? 'selected' : '' }}>Agribisnis Pengolahan Hasil Pertanian</option>
                </select>
            </div>

        </div>

        <!-- TELEPON -->
        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Nomor Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon') }}" 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                   placeholder="Contoh: 081234567890">
        </div>

        <!-- ALAMAT -->
        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
            <textarea name="alamat" rows="3" 
                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                      placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
        </div>

        <!-- TOMBOL -->
        <div class="flex gap-3 mt-6">
            <button type="submit" 
                    class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md">
                💾 Simpan Data
            </button>
            <a href="{{ route('siswa.index') }}" 
               class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition shadow-md text-center">
                ❌ Batal
            </a>
        </div>

    </form>

</div>

@endsection