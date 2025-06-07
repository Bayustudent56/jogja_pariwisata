<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini untuk mengimpor facade DB

class KategoriGalerisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kategori_galeris')->insert(array ( // Menggunakan DB:: tanpa backslash karena sudah diimpor
            0 => 
            array (
                'id' => 100,
                'nama_kategori' => 'Alam',
                'slug' => 'alam',
                'gambar' => 'images/alam.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
            1 => 
            array (
                'id' => 200,
                'nama_kategori' => 'Budaya & Sejarah',
                'slug' => 'budaya-sejarah',
                'gambar' => 'images/budaya.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
            2 => 
            array (
                'id' => 300,
                'nama_kategori' => 'Edukasi',
                'slug' => 'edukasi',
                'gambar' => 'images/sonobudoyo2.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
            3 => 
            array (
                'id' => 400,
                'nama_kategori' => 'Kreatif',
                'slug' => 'kreatif',
                'gambar' => 'images/artpaper.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
            4 => 
            array (
                'id' => 500,
                'nama_kategori' => 'Kuliner Tradisional',
                'slug' => 'kuliner-tradisional',
                'gambar' => 'images/gudeg.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
            5 => 
            array (
                'id' => 600,
                'nama_kategori' => 'Kuliner Kekinian',
                'slug' => 'kuliner-kekinian',
                'gambar' => 'images/tempogelato.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:34:47',
            ),
        ));
        
        
    }
}

