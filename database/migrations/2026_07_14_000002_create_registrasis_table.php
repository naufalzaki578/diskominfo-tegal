<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nim_nis');
            $table->string('asal_instansi');
            $table->string('jurusan');
            $table->string('email');
            $table->string('no_hp');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('surat_pengantar_path')->nullable();
            $table->string('cv_path')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrasis');
    }
};