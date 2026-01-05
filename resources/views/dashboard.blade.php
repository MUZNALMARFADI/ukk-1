<x-app-layout>

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Inter', sans-serif;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .stat-title {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 800;
            color: #1f2937;
            line-height: 1;
        }

        .table-wrapper {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead tr {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
            font-size: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.5;
        }
    </style>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- GREETING -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Hai, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-600 mt-1">Berikut adalah ringkasan pembayaran SPP hari ini</p>
            </div>

            <!-- STAT CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Total Siswa</div>
                    <div class="stat-value">{{ number_format($totalSiswa) }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="stat-title">Total Kelas</div>
                    <div class="stat-value">{{ number_format($totalKelas) }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Pembayaran Masuk</div>
                    <div class="stat-value">Rp {{ number_format($totalPembayaran / 1000000, 1) }}M</div>
                </div>

            </div>

            <!-- TABEL PEMBAYARAN TERBARU -->
            <div class="table-wrapper">

                <div class="table-title">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Pembayaran Terbaru
                </div>

                @if ($pembayaranTerbaru->count() > 0)
                    <div class="overflow-x-auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
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
                                    <td>
                                        <span class="font-bold text-purple-600">
                                            Rp {{ number_format($p->jumlah_bayar) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($p->tgl_bayar)->format('d M Y') }}
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lunas</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <p class="text-lg font-medium">Belum ada pembayaran hari ini</p>
                        <p class="text-sm mt-1">Pembayaran akan muncul di sini setelah diproses</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>