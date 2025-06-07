<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriGaleri;

class KategoriGaleriSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Daftar kategori galeri dengan path gambar spesifik
        // Path gambar ini relatif terhadap folder public/images/
        $kategorisData = [
            ['nama_kategori' => 'Alam', 'gambar' => 'images/alam.jpg'],
            ['nama_kategori' => 'Budaya & Sejarah', 'gambar' => 'images/budaya.jpg'],
            ['nama_kategori' => 'Edukasi', 'gambar' => 'images/sonobudoyo2.jpg'],
            ['nama_kategori' => 'Kreatif', 'gambar' => 'images/artpaper.jpg'],
            ['nama_kategori' => 'Kuliner Tradisional', 'gambar' => 'images/gudeg.jpg'],
            ['nama_kategori' => 'Kuliner Kekinian', 'gambar' => 'images/tempogelato.jpg'],
        ];

        foreach ($kategorisData as $data) {
            KategoriGaleri::updateOrCreate( // Menggunakan updateOrCreate
                ['nama_kategori' => $data['nama_kategori']], // Kriteria untuk mencari
                ['slug' => \Illuminate\Support\Str::slug($data['nama_kategori']), 'gambar' => $data['gambar']] // Data untuk di-create atau di-update
            );
        }
    }
}
