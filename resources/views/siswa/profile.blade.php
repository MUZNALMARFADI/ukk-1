@extends('layouts.admin')

@section('title','Profil Siswa')

@section('content')
<div class="max-w-3xl mx-auto">
  <div class="bg-white p-6 rounded-xl shadow-lg flex items-start gap-6">
    <div class="w-28 h-28 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-2xl font-bold">
      {{ substr($siswa->nama,0,1) }}
    </div>
    <div class="flex-1">
      <h2 class="text-2xl font-semibold mb-1">{{ $siswa->nama }}</h2>
      <div class="text-sm text-gray-500">NISN: {{ $siswa->nisn }}</div>
      <div class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="p-3 border rounded">Kelas: <div class="font-semibold">{{ $siswa->kelas->nama_kelas }}</div></div>
        <div class="p-3 border rounded">Telepon: <div class="font-semibold">{{ $siswa->telepon }}</div></div>
        <div class="p-3 border rounded">Kategori SPP: <div class="font-semibold">{{ $siswa->kategori_spp ?? 'Normal' }}</div></div>
      </div>

      <div class="mt-4">
        <h3 class="font-semibold mb-2">Riwayat Pembayaran</h3>
        <div class="space-y-2">
          @foreach($siswa->pembayaran as $p)
            <div class="p-3 border rounded flex justify-between items-center">
              <div>
                <div class="font-medium">{{ $p->bulan_dibayar }} — {{ \Carbon\Carbon::parse($p->tgl_bayar)->format('d M Y') }}</div>
                <div class="text-sm text-gray-500">SPP: {{ $p->spp->kategori }} — Rp {{ number_format($p->jumlah_bayar) }}</div>
              </div>
              <div class="text-sm text-gray-500">{{ $p->petugas ? $p->petugas->name : '-' }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection