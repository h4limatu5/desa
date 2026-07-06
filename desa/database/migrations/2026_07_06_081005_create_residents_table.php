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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();

            // Identitas
            $table->string('nik', 16)->unique();
            $table->string('kk', 16)->nullable();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();

            // Kontak & Alamat
            $table->string('nomor_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();

            // Status
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai', 'Cerai Mati', 'Lainnya'])->nullable();
            $table->enum('status_warga', ['Aktif', 'Nonaktif'])->default('Aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
