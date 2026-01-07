@extends('layouts.layout')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-radius: 24px;
        padding: 32px;
        color: white;
        margin-bottom: 32px;
        box-shadow: 0 10px 40px rgba(16, 185, 129, 0.2);
    }

    .data-card {
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(16, 185, 129, 0.08);
        border: 1px solid #d1fae5;
    }

    .btn-add {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        text-decoration: none;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .search-box {
        position: relative;
        margin-bottom: 24px;
    }

    .search-input {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 2px solid #d1fae5;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .search-input:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    thead {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    thead th {
        padding: 16px 20px;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: white;
        text-align: left;
    }

    thead th:first-child {
        border-top-left-radius: 12px;
    }

    thead th:last-child {
        border-top-right-radius: 12px;
    }

    tbody td {
        padding: 18px 20px;
        border-bottom: 1px solid #f0fdf4;
        color: #374151;
        font-size: 14px;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr:hover {
        background: #f0fdf4;
    }

    .badge-kelas {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .student-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 2px;
    }

    .student-nisn {
        font-size: 12px;
        color: #9ca3af;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit {
        background: #fbbf24;
        color: white;
        margin-right: 6px;
    }

    .btn-edit:hover {
        background: #f59e0b;
        transform: translateY(-1px);
        color: white;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }

    .alert-success {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border-left: 4px solid #10b981;
        color: #065f46;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-text {
        font-size: 18px;
        color: #6b7280;
        font-weight: 500;
    }
</style>

<!-- HEADER -->
<div class="page-header">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold mb-2">📚 Data Siswa</h1>
            <p class="text-emerald-100">Kelola semua data siswa dengan mudah</p>
        </div>
        <a href="{{ route('siswa.create') }}" class="btn-add">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Siswa
        </a>
    </div>
</div>

<!-- CONTENT CARD -->
<div class="data-card">

    @if(session('success'))
        <div class="alert-success">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- SEARCH -->
    <div class="search-box">
        <svg class="search-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <input type="text" class="search-input" placeholder="Cari siswa berdasarkan nama atau NISN...">
    </div>

    @if($siswa->count() > 0)
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Telepon</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $s)
                    <tr>
                        <td>
                            <div class="student-name">{{ $s->nama }}</div>
                            <div class="student-nisn">NISN: {{ $s->nisn }}</div>
                        </td>
                        <td>
                            <span class="badge-kelas">{{ $s->tingkat }}</span>
                        </td>
                        <td>{{ $s->jurusan }}</td>
                        <td>{{ $s->telepon ?? '-' }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('siswa.edit',$s->id) }}" class="btn-action btn-edit">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('siswa.destroy',$s->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus siswa {{ $s->nama }}?')"
                                        class="btn-action btn-delete">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $siswa->links() }}
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">📭</div>
            <p class="empty-text">Belum ada data siswa</p>
            <p style="color: #9ca3af; font-size: 14px; margin-top: 8px;">
                Klik tombol "Tambah Siswa" untuk menambahkan data baru
            </p>
        </div>
    @endif

</div>

@endsection