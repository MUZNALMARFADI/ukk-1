<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
        $table->foreignId('petugas_id')->nullable()->constrained('users')->onDelete('set null');
        $table->foreignId('spp_id')->nullable()->constrained('spp')->onDelete('set null'); // ← UBAH JADI NULLABLE
        $table->date('tgl_bayar');
        $table->string('bulan_dibayar')->nullable(); // ← UBAH JADI NULLABLE
        $table->bigInteger('jumlah_bayar');
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
