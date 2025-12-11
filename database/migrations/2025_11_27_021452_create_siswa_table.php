<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
    $table->id();
    $table->string('nisn')->unique();
    $table->string('nama');

    // GANTI ini
    // $table->string('kelas');
    // $table->string('jurusan');

    // JADI INI
    $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
    $table->string('jurusan')->nullable();   // Biar tidak error lagi

    $table->string('alamat')->nullable();
    $table->string('telepon')->nullable();

    $table->foreignId('user_id')->nullable()
          ->constrained('users')
          ->onDelete('set null');

    $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }

};