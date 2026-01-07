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
        box-shadow: 0 4px 20px rgba(16, 185, 129, 0.08);
        border: 1px solid #d1fae5;
    }

    .form-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 32px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0fdf4;
    }

    .form-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
        border: 2px solid #d1fae5;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: white;
    }

    .input-box:focus, .select-box:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }

    .textarea-box {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #d1fae5;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: white;
        resize: vertical;
        min-height: 100px;
    }

    .textarea-box:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
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
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <h2 class="form-title">➕ Tambah Siswa Baru</h2>
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

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            <div class="grid-2">
                <!-- NISN -->
                <div class="input-group">
                    <label class="input-label">
                        NISN <span class="required">*</span>
                    </label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" 
                           class="input-box" 
                           placeholder="Contoh: 0051234567" required>
                </div>

                <!-- NAMA -->
                <div class="input-group">
                    <label class="input-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama') }}" 
                           class="input-box" 
                           placeholder="Contoh: Ahmad Zainuddin" required>
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
                        <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>Kelas X</option>
                        <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>Kelas XI</option>
                        <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>Kelas XII</option>
                    </select>
                </div>

                <!-- TELEPON -->
                <div class="input-group">
                    <label class="input-label">Nomor Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" 
                           class="input-box" 
                           placeholder="Contoh: 081234567890">
                </div>
            </div>

            <!-- JURUSAN -->
            <div class="input-group">
                <label class="input-label">
                    Jurusan <span class="required">*</span>
                </label>
                <select name="jurusan" class="select-box" required>
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

            <!-- ALAMAT -->
            <div class="input-group">
                <label class="input-label">Alamat Lengkap</label>
                <textarea name="alamat" class="textarea-box" placeholder="Contoh: Jl. Merdeka No. 123, Kota Malang">{{ old('alamat') }}</textarea>
            </div>

            <!-- TOMBOL -->
            <div class="btn-group">
                <button type="submit" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Data
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