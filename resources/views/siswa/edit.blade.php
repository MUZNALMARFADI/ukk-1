@extends('layouts.layout')

@section('content')

<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .form-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 32px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f3f4f6;
    }

    .form-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-title {
        font-size: 28px;
        font-weight: 800;
        color: #1f2937;
    }

    .input-group {
        margin-bottom: 24px;
    }

    .input-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .required {
        color: #ef4444;
        margin-left: 4px;
    }

    .input-box, .select-box {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: white;
    }

    .input-box:focus, .select-box:focus {
        outline: none;
        border-color: #f59e0b;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
    }

    .textarea-box {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: white;
        resize: vertical;
        min-height: 100px;
    }

    .textarea-box:focus {
        outline: none;
        border-color: #f59e0b;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .grid-2 {
            grid-template-columns: 1fr;
        }
    }

    .btn-group {
        display: flex;
        gap: 12px;
        margin-top: 32px;
    }

    .btn-primary {
        flex: 1;
        padding: 14px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
    }

    .btn-secondary {
        flex: 1;
        padding: 14px;
        background: #6b7280;
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-secondary:hover {
        background: #4b5563;
        transform: translateY(-2px);
        color: white;
    }

    .alert-error {
        background: #fef2f2;
        border-left: 4px solid #ef4444;
        color: #991b1b;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
    }

    .alert-error ul {
        list-style: disc;
        padding-left: 20px;
        margin: 0;
    }

    .alert-error li {
        margin-bottom: 4px;
    }
</style>

<div class="form-container">
    <div class="form-card">

        <div class="form-header">
            <div class="form-icon">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h2 class="form-title">✏️ Edit Data Siswa</h2>
        </div>

        @if($errors->any())
            <div class="alert-error">
                <strong>Oops! Ada beberapa kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid-2">
                <!-- NISN -->
                <div class="input-group">
                    <label class="input-label">
                        NISN <span class="required">*</span>
                    </label>
                    <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" 
                           class="input-box" required>
                </div>

                <!-- NAMA -->
                <div class="input-group">
                    <label class="input-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" 
                           class="input-box" required>
                </div>
            </div>

            <div class="grid-2">
                <!-- KELAS/TINGKAT -->
                <div class="input-group">
                    <label class="input-label">
                        Kelas <span class="required">*</span>
                    </label>
                    <select name="tingkat" class="select-box" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="X" {{ $siswa->tingkat == 'X' ? 'selected' : '' }}>Kelas X</option>
                        <option value="XI" {{ $siswa->tingkat == 'XI' ? 'selected' : '' }}>Kelas XI</option>
                        <option value="XII" {{ $siswa->tingkat == 'XII' ? 'selected' : '' }}>Kelas XII</option>
                    </select>
                </div>

                <!-- TELEPON -->
                <div class="input-group">
                    <label class="input-label">Nomor Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon', $siswa->telepon) }}" 
                           class="input-box">
                </div>
            </div>

            <!-- JURUSAN -->
            <div class="input-group">
                <label class="input-label">
                    Jurusan <span class="required">*</span>
                </label>
                <select name="jurusan" class="select-box" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Rekayasa Perangkat Lunak" {{ $siswa->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                    <option value="Desain Komunikasi Visual" {{ $siswa->jurusan == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                    <option value="Teknik Komputer dan Jaringan" {{ $siswa->jurusan == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                    <option value="Mekatronika" {{ $siswa->jurusan == 'Mekatronika' ? 'selected' : '' }}>Mekatronika</option>
                    <option value="Teknik Body Otomotif" {{ $siswa->jurusan == 'Teknik Body Otomotif' ? 'selected' : '' }}>Teknik Body Otomotif</option>
                    <option value="Teknik Pengelasan" {{ $siswa->jurusan == 'Teknik Pengelasan' ? 'selected' : '' }}>Teknik Pengelasan</option>
                    <option value="Teknik Bodi Kendaraan Ringan" {{ $siswa->jurusan == 'Teknik Bodi Kendaraan Ringan' ? 'selected' : '' }}>Teknik Bodi Kendaraan Ringan</option>
                    <option value="Teknik Permesinan" {{ $siswa->jurusan == 'Teknik Permesinan' ? 'selected' : '' }}>Teknik Permesinan</option>
                    <option value="Agribisnis Tanaman Pangan dan Hortikultura" {{ $siswa->jurusan == 'Agribisnis Tanaman Pangan dan Hortikultura' ? 'selected' : '' }}>Agribisnis Tanaman Pangan dan Hortikultura</option>
                    <option value="Agribisnis Pengolahan Hasil Pertanian" {{ $siswa->jurusan == 'Agribisnis Pengolahan Hasil Pertanian' ? 'selected' : '' }}>Agribisnis Pengolahan Hasil Pertanian</option>
                </select>
            </div>

            <!-- ALAMAT -->
            <div class="input-group">
                <label class="input-label">Alamat Lengkap</label>
                <textarea name="alamat" class="textarea-box">{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            <!-- TOMBOL -->
            <div class="btn-group">
                <button type="submit" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Data
                </button>
                <a href="{{ route('siswa.index') }}" class="btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

@endsection