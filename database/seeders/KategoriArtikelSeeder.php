<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriArtikel;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Daftar kategori artikel dengan path gambar spesifik
        // Path gambar ini relatif terhadap folder public/images/
        $kategorisData = [
            ['nama_kategori' => 'Alam', 'gambar' => 'images/alam.jpg'],
            ['nama_kategori' => 'Budaya & Sejarah', 'gambar' => 'images/budaya2.jpg'],
            ['nama_kategori' => 'Edukasi', 'gambar' => 'images/edukasi.jpg'],
            ['nama_kategori' => 'Kreatif', 'gambar' => 'images/kreatif.jpg'],
            ['nama_kategori' => 'Kuliner Tradisional', 'gambar' => 'images/kulinertradisional.png'],
            ['nama_kategori' => 'Kuliner Kekinian', 'gambar' => 'images/coklat.jpg'],
        ];

        foreach ($kategorisData as $data) {
            KategoriArtikel::updateOrCreate( // Menggunakan updateOrCreate untuk mengisi gambar jika kategori sudah ada
                ['nama_kategori' => $data['nama_kategori']], // Kriteria pencarian
                [
                    'slug' => \Illuminate\Support\Str::slug($data['nama_kategori']), // Pastikan slug juga di-update/dibuat
                    'gambar' => $data['gambar'] // Atribut tambahan untuk create atau update
                ]
            );
        }
    }
}
