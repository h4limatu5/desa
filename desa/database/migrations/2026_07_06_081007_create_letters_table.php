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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resident_id')->constrained('residents')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('jenis_surat');

            $table->enum('status', ['submitted', 'approved', 'rejected'])->default('submitted');

            // Nomor dan tanggal setelah approve
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();

            // Data pengajuan yang akan digunakan merender template
            $table->json('isi_data_json')->nullable();

            // Penyimpanan PDF hasil generate
            $table->string('pdf_path')->nullable();

            $table->text('rejected_reason')->nullable();

            // Admin timestamps
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();

            $table->timestamps();

            $table->index(['resident_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};



