<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pembayaran
        </h2>
    </x-slot>

    <style>
        .payment-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .payment-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .payment-header {
            text-align: center;
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 2px solid #f3f4f6;
        }

        .payment-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .payment-title {
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
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 32px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
        }
    </style>

    <div class="py-6">
        <div class="payment-container">
            
            <div class="payment-card">

                <div class="payment-header">
                    <div class="payment-icon">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h2 class="payment-title">Form Pembayaran SPP</h2>
                </div>

                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf

                    <!-- PILIH SISWA -->
                    <div class="input-group">
                        <label class="input-label">Nama Siswa</label>
                        <select name="siswa_id" class="select-box" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->nama }} - {{ $s->nama_kelas }} ({{ $s->nisn }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- NOMINAL -->
                    <div class="input-group">
                        <label class="input-label">Jumlah Bayar (Rp)</label>
                        <input type="number" name="jumlah_bayar" class="input-box"
                            placeholder="Contoh: 500000" required>
                    </div>

                    <!-- TANGGAL BAYAR -->
                    <div class="input-group">
                        <label class="input-label">Tanggal Bayar</label>
                        <input type="date" name="tgl_bayar" class="input-box"
                        value="{{ date('Y-m-d') }}" required>
                </div>

                <!-- TOMBOL BAYAR -->
                <button type="submit" class="btn-submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    PROSES PEMBAYARAN
                </button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>