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
        Schema::create('pengajuan_p_k_l_s', function (Blueprint $table) {
            $table->id();
             // Relasi ke user (siswa/mahasiswa)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Relasi ke dudi (dunia usaha/industri)
            $table->unsignedBigInteger('dudi_id');
            $table->foreign('dudi_id')->references('id')->on('dudis')->onDelete('cascade');
            // Tanggal pengajuan dan status
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_p_k_l_s');
    }
};
