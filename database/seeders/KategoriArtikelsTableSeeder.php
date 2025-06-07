<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini untuk mengimpor facade DB


class KategoriArtikelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('kategori_artikels')->delete();
        
        DB::table('kategori_artikels')->insert(array (
            0 => 
            array (
                'id' => 100,
                'nama_kategori' => 'Alam',
                'slug' => 'alam',
                'gambar' => 'images/alam.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 11:48:35',
            ),
            1 => 
            array (
                'id' => 200,
                'nama_kategori' => 'Edukasi',
                'slug' => 'edukasi',
                'gambar' => 'images/edukasi.jpeg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 11:48:35',
            ),
            2 => 
            array (
                'id' => 300,
                'nama_kategori' => 'Budaya & Sejarah',
                'slug' => 'budaya-sejarah',
                'gambar' => 'images/budaya2.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 11:48:35',
            ),
            3 => 
            array (
                'id' => 400,
                'nama_kategori' => 'Kuliner Tradisional',
                'slug' => 'kuliner-tradisional',
                'gambar' => 'images/kulinertradisional.png',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 11:48:35',
            ),
            4 => 
            array (
                'id' => 500,
                'nama_kategori' => 'Kuliner Kekinian',
                'slug' => 'kuliner-kekinian',
                'gambar' => 'images/coklat.jpg',
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 11:48:35',
            ),
            5 => 
            array (
                'id' => 600,
                'nama_kategori' => 'Kreatif',
                'slug' => 'kreatif',
                'gambar' => 'images/kreatif.jpg',
                'created_at' => '2025-06-06 03:41:59',
                'updated_at' => '2025-06-06 11:48:35',
            ),
        ));
        
        
    }
}