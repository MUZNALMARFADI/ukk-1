<x-app-layout>

    <style>
        body {
            background: #0b1e3f;
        }

        .card {
            background: #10244d;
            border-radius: 18px;
            padding: 25px;
            color: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            color: #4da3ff;
        }

        .table-wrapper {
            background: #10244d;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        thead tr {
            background: #0d1b36;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #1d335f;
        }

        tr:hover {
            background: #0d1b36;
        }
    </style>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- STAT CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                <div class="card">
                    <h3 class="text-lg font-bold">Total Siswa</h3>
                    <p class="text-4xl font-extrabold mt-2">{{ $totalSiswa }}</p>
                </div>

                <div class="card">
                    <h3 class="text-lg font-bold">Total Kelas</h3>
                    <p class="text-4xl font-extrabold mt-2">{{ $totalKelas }}</p>
                </div>

                <div class="card">
                    <h3 class="text-lg font-bold">Total Pembayaran Masuk</h3>
                    <p class="text-3xl font-extrabold mt-2">
                        Rp {{ number_format($totalPembayaran) }}
                    </p>
                </div>

            </div>

            <!-- TABEL PEMBAYARAN TERBARU -->
            <div class="table-wrapper">

                <h3 class="text-xl font-bold mb-4" style="color: #4da3ff;">Pembayaran Terbaru</h3>

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
                        @foreach ($pembayaranTerbaru as $p)
                        <tr>
                            <td>{{ $p->siswa->nama }}</td>
                            <td>{{ $p->siswa->kelas->nama_kelas ?? '-' }}</td>
                            <td>Rp {{ number_format($p->jumlah_bayar) }}</td>
                            <td>{{ $p->tgl_bayar }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($pembayaranTerbaru->count() == 0)
                <p class="text-gray-300 text-center p-4">Belum ada pembayaran.</p>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
