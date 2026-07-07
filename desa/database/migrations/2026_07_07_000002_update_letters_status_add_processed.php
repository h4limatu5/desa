<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB as DB_Facade;

return new class extends Migration
{
    public function up(): void
    {
        // Safety: ubah type `letters.status` menjadi VARCHAR/TEXT yang aman untuk semua engine.
        // Dengan cara ini, nilai baru `processed` tidak lagi bergantung pada ALTER ENUM engine tertentu.
        $driver = DB_Facade::connection()->getDriverName();

        Schema::table('letters', function (Blueprint $table) use ($driver) {
            if ($driver === 'mysql') {
                $table->string('status', 20)->default('submitted')->change();
            } else {
                // SQLite/others: ubah ke TEXT
                // Laravel tidak selalu menyediakan `change()` untuk type ini, maka gunakan raw SQL.
                DB_Facade::statement("ALTER TABLE letters ALTER COLUMN status TYPE TEXT");
            }
        });
    }

    public function down(): void
    {
        // Best-effort revert: kembalikan tipe tetap string.
        // Karena kita menghilangkan enum constraint, down tidak bisa 100% menjamin enforcement.
        if (DB_Facade::connection()->getDriverName() === 'mysql') {
            Schema::table('letters', function (Blueprint $table) {
                $table->string('status', 20)->default('submitted')->change();
            });
        }
    }
};




