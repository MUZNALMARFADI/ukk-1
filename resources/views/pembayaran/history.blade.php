<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            History Pembayaran
        </h2>
    </x-slot>

    <style>
        .history-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.08);
            border: 1px solid #d1fae5;
        }

        .history-title {
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
            padding: 16px 20px;
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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="history-card">
                <div class="history-title">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Riwayat Pembayaran SPP
                </div>

                @if ($history->count() > 0)
                    <div class="overflow-x-auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $h)
                                <tr>
                                    <td>
                                        <div style="font-weight: 600;">{{ $h->siswa->nama }}</div>
                                        <div style="font-size: 12px; color: #9ca3af;">{{ $h->siswa->nisn }}</div>
                                    </td>
                                    <td>{{ $h->siswa->nama_kelas }}</td>
                                    <td>
                                        <span style="font-weight: 700; color: #10b981;">
                                            Rp {{ number_format($h->jumlah_bayar) }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($h->tgl_bayar)->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <p style="font-size: 18px; font-weight: 500;">Belum ada history pembayaran</p>
                        <p style="font-size: 14px; margin-top: 8px;">History pembayaran akan muncul di sini</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>