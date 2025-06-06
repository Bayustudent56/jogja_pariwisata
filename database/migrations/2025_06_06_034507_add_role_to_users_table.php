<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'role' jika belum ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->after('email'); // Default 'user', diletakkan setelah kolom 'email'
            }
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'role' jika ada
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
