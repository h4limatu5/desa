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
        Schema::create('letter_templates', function (Blueprint $table) {
            $table->id();

            // Jenis surat (contoh: pengantar, tdk mampu, dll)
            $table->string('jenis_surat');

            // Nama template untuk admin
            $table->string('name');

            // Content template Blade (string) - akan dirender saat approve
            $table->longText('template_content');

            $table->timestamps();

            $table->unique(['jenis_surat', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_templates');
    }
};



