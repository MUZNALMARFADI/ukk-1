<x-app-layout>

<style>
    body {
        background: #f0fdf4;
        font-family: 'Inter', sans-serif;
    }

    .card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #d1fae5;
        box-shadow: 0 4px 12px rgba(16,185,129,.08);
    }

    .card:hover {
        box-shadow: 0 10px 25px rgba(16,185,129,.15);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .stat-title {
        font-size: 13px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #10b981;
        color: white;
    }

    thead th {
        padding: 14px;
        font-size: 13px;
        text-align: left;
        font-weight: 600;
    }

    tbody td {
        padding: 14px;
        border-bottom: 1px solid #ecfdf5;
        font-size: 14px;
    }

    tbody tr:hover {
        background: #f0fdf4;
    }

    .badge {
        padding: 5px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #d1fae5;
        color: #065f46;
    }
</style>

<div class="py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">
                Hai, {{ Auth::user()->name }} 👋
            </h1>
            <p class="text-sm text-gray-600">
                Ringkasan pembayaran SPP hari ini
            </p>
        </div>
        
        <!-- STAT CARDS (JARAK BAWAH DITAMBAH) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="card">
                <div class="stat-icon bg-emerald-500">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z"/>
                    </svg>
                </div>
                <div class="stat-title">Total Siswa</div>
                <div class="stat-value">{{ number_format($totalSiswa) }}</div>
            </div>

            <div class="card">
                <div class="stat-icon bg-emerald-400">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/>
                    </svg>
                </div>
                <div class="stat-title">Total Kelas</div>
                <div class="stat-value">{{ number_format($totalKelas) }}</div>
            </div>

            <div class="card">
                <div class="stat-icon bg-emerald-600">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2"/>
                    </svg>
                </div>
                <div class="stat-title">Pembayaran Masuk</div>
                <div class="stat-value">
                    Rp {{ number_format($totalPembayaran / 1000000, 1) }}M
                </div>
            </div>
        </div>

        <!-- PEMBAYARAN TERBARU -->
        <div class="card mt-16">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">
                Pembayaran Terbaru
            </h2>

            @if ($pembayaranTerbaru->count())
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaranTerbaru as $p)
                            <tr>
                                <td>
                                    <div class="font-semibold">{{ $p->siswa->nama }}</div>
                                    <div class="text-xs text-gray-500">{{ $p->siswa->nisn }}</div>
                                </td>
                                <td>{{ $p->siswa->nama_kelas }}</td>
                                <td class="font-semibold text-emerald-600">
                                    Rp {{ number_format($p->jumlah_bayar) }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($p->tgl_bayar)->format('d M Y') }}</td>
                                <td><span class="badge">Lunas</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <div class="text-4xl mb-2">📭</div>
                    Belum ada pembayaran hari ini
                </div>
            @endif
        </div>

    </div>
</div>

</x-app-layout>
