@extends('layouts.layout')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        border-radius: 24px;
        padding: 32px;
        color: white;
        margin-bottom: 32px;
        box-shadow: 0 10px 40px rgba(79, 172, 254, 0.3);
    }

    .data-card {
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .btn-add {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        text-decoration: none;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.5);
        color: white;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    thead {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        font-size: 14px;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr:hover {
        background: #ecfeff;
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

    .nominal-badge {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        display: inline-block;
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
</style>

<!-- HEADER -->
<div class="page-header">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold mb-2">💰 Data SPP</h1>
            <p class="text-cyan-100">Kelola tarif pembayaran SPP</p>
        </div>
        <a href="{{ route('spp.create') }}" class="btn-add">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah SPP
        </a>
    </div>
</div>

<!-- CONTENT CARD -->
<div class="data-card">

    @if($spp->count() > 0)
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($spp as $s)
                    <tr>
                        <td>
                            <div style="font-weight: 600; font-size: 16px;">{{ $s->tahun }}</div>
                        </td>
                        <td>{{ $s->kategori }}</td>
                        <td>
                            <span class="nominal-badge">
                                Rp {{ number_format($s->nominal, 0, ',', '.') }}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('spp.edit', $s->id) }}" class="btn-action btn-edit">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('spp.destroy', $s->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data SPP ini?')"
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
    @else
        <div class="empty-state">
            <div class="empty-icon">📭</div>
            <p style="font-size: 18px; color: #6b7280; font-weight: 500;">Belum ada data SPP</p>
            <p style="color: #9ca3af; font-size: 14px; margin-top: 8px;">
                Klik tombol "Tambah SPP" untuk menambahkan data baru
            </p>
        </div>
    @endif

</div>

@endsection