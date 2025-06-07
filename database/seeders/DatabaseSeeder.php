<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Panggil seeder kategori DULUAN
        $this->call([
            KategoriGaleriSeeder::class,    // Pastikan ini di-uncomment
            KategoriArtikelSeeder::class,   // Pastikan ini di-uncomment
        ]);

        // Kemudian panggil seeder untuk item (galeri, artikel)
        $this->call([
            GaleriSeeder::class,
            // ArtikelSeeder::class,         // Panggil jika Anda punya ArtikelSeeder
        ]);

        // Opsional: Buat beberapa user dummy
        // \App\Models\User::factory(10)->create();
        $this->call(ArtikelsTableSeeder::class);
        $this->call(GalerisTableSeeder::class);
        $this->call(KategoriArtikelsTableSeeder::class);
        $this->call(KategoriGalerisTableSeeder::class);
    }
}
