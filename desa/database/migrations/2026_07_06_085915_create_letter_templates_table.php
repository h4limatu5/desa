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
        // Migration duplikat: sengaja NO-OP untuk mencegah bentrok skema.
        // Skema letter_templates didefinisikan di 2026_07_06_081006_create_letter_templates_table.php.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // NO-OP.
    }
};

