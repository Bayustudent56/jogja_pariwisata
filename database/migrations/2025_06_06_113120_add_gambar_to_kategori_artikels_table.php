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
        Schema::table('kategori_artikels', function (Blueprint $table) {
            // Tambahkan kolom 'gambar' jika belum ada
            if (!Schema::hasColumn('kategori_artikels', 'gambar')) {
                $table->string('gambar')->nullable()->after('slug'); // Letakkan setelah slug, bisa kosong
            }
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('kategori_artikels', function (Blueprint $table) {
            // Hapus kolom 'gambar' jika ada
            if (Schema::hasColumn('kategori_artikels', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });
    }
};
