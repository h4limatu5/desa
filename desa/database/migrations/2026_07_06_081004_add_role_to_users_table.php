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
        Schema::table('users', function (Blueprint $table) {
            // Role untuk pembagian akses (admin vs warga)
            $table->enum('role', ['admin', 'warga'])->default('warga')->after('email_verified_at');

            // Hubungkan user warga ke data resident (NIK terverifikasi)
            $table->foreignId('resident_id')->nullable()->after('role')->constrained('residents')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['resident_id']);
            $table->dropColumn('resident_id');
            $table->dropColumn('role');
        });
    }
};

