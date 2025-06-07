<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artikel; // Impor model Artikel
use App\Models\KategoriArtikel; // Impor model KategoriArtikel
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file
use Illuminate\Support\Facades\Log; // Untuk logging
use Illuminate\Support\Str; // <--- TAMBAHKAN BARIS INI

class ArtikelSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Ambil kategori yang sudah ada dari KategoriArtikelSeeder
        // Pastikan KategoriArtikelSeeder dijalankan DULUAN di DatabaseSeeder
        $kategoriAlam = KategoriArtikel::where('nama_kategori', 'Alam')->first();
        $kategoriBudaya = KategoriArtikel::where('nama_kategori', 'Budaya & Sejarah')->first();
        $kategoriEdukasi = KategoriArtikel::where('nama_kategori', 'Edukasi')->first();
        $kategoriKreatif = KategoriArtikel::where('nama_kategori', 'Kreatif')->first();
        $kategoriKulinerTradisional = KategoriArtikel::where('nama_kategori', 'Kuliner Tradisional')->first();
        $kategoriKulinerKekinian = KategoriArtikel::where('nama_kategori', 'Kuliner Kekinian')->first();

        // Data artikel yang akan di-seed
        $artikelItems = [
            [
                'judul' => 'Panduan Mendaki Gunung Merapi',
                'gambar_path_public' => 'images/merapi.jpg',
                'isi' => '<p>Tips dan trik mendaki Gunung Merapi dengan aman dan menyenangkan. Persiapan fisik dan mental yang matang adalah kunci.</p><p>Nikmati pemandangan sunrise yang tak terlupakan.</p><p><img src="/storage/artikel_tinymce_uploads/contoh-isi-merapi.jpg" alt="Pemandangan Merapi"></p>',
                'kategori_artikel_id' => $kategoriAlam->id ?? null,
                'view_count' => 120,
            ],
            [
                'judul' => 'Sejarah dan Filosofi Batik Jogja',
                'gambar_path_public' => 'images/batik.jpg',
                'isi' => '<p>Mengenal lebih dalam sejarah dan filosofi di balik motif-motif batik khas Yogyakarta yang sarat makna.</p><p>Belajar cara membuat batik tulis tradisional.</p><p><img src="/storage/artikel_tinymce_uploads/contoh-isi-batik.jpg" alt="Batik Tulis"></p>',
                'kategori_artikel_id' => $kategoriBudaya->id ?? null,
                'view_count' => 180,
            ],
            [
                'judul' => 'Edukasi di Taman Pintar Yogyakarta',
                'gambar_path_public' => 'images/tamanpintar.jpg',
                'isi' => '<p>Taman Pintar adalah pusat edukasi yang menyenangkan untuk anak-anak dan keluarga. Eksplorasi sains dan teknologi dengan cara interaktif.</p><p>Pengalaman belajar yang tidak membosankan.</p>',
                'kategori_artikel_id' => $kategoriEdukasi->id ?? null,
                'view_count' => 150,
            ],
            [
                'judul' => 'Potensi Ekonomi Kreatif di Jogja',
                'gambar_path_public' => 'images/kreatif.jpg',
                'isi' => '<p>Yogyakarta dikenal sebagai kota kreatif dengan berbagai inovasi dari para seniman dan pengusaha muda.</p><p>Mulai dari kerajinan tangan hingga startup digital.</p>',
                'kategori_artikel_id' => $kategoriKreatif->id ?? null,
                'view_count' => 90,
            ],
            [
                'judul' => 'Menjelajahi Kelezatan Sate Klatak',
                'gambar_path_public' => 'images/sateklatak.jpg',
                'isi' => '<p>Sate Klatak, hidangan sate kambing khas Jogja yang disajikan dengan tusuk jeruji sepeda dan dibakar di atas arang.</p><p>Rasakan sensasi uniknya.</p>',
                'kategori_artikel_id' => $kategoriKulinerTradisional->id ?? null,
                'view_count' => 220,
            ],
            [
                'judul' => 'Coffee Shop Kekinian di Pusat Kota',
                'gambar_path_public' => 'images/kopi.jpg',
                'isi' => '<p>Daftar rekomendasi coffee shop paling hits dan nyaman di Yogyakarta, cocok untuk nongkrong atau bekerja.</p><p>Nikmati suasana yang cozy dan kopi berkualitas.</p>',
                'kategori_artikel_id' => $kategoriKulinerKekinian->id ?? null,
                'view_count' => 170,
                ],
        ];

        $targetStorageFolder = 'artikel'; // Folder untuk gambar artikel utama
        $tinymceStorageFolder = 'artikel_tinymce_uploads'; // Folder untuk gambar dari TinyMCE
        $placeholderFileName = 'placeholder.jpg';

        if (!Storage::disk('public')->exists($targetStorageFolder)) {
            Storage::disk('public')->makeDirectory($targetStorageFolder);
        }
        if (!Storage::disk('public')->exists($tinymceStorageFolder)) {
            Storage::disk('public')->makeDirectory($tinymceStorageFolder);
        }

        // Buat file placeholder SANGAT sederhana langsung di storage/app/public/artikel/
        $placeholderContent = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAKAAAABACAYAAAD0o/E9AAAAAXNSR0IArs4c6QAAACtJREFUeJztwQEBAAAAgiD7pydLAAIAAAAAAAAAAAAAAAAAAAAAAOADwRkAAXh+Y4QAAAAASUVORK5CYII=');
        if (!Storage::disk('public')->exists($targetStorageFolder . '/' . $placeholderFileName)) {
            Storage::disk('public')->put($targetStorageFolder . '/' . $placeholderFileName, $placeholderContent);
            Log::info('ArtikelSeeder: File placeholder artikel dibuat langsung di storage.');
        }
        if (!Storage::disk('public')->exists($tinymceStorageFolder . '/' . $placeholderFileName)) {
            Storage::disk('public')->put($tinymceStorageFolder . '/' . $placeholderFileName, $placeholderContent);
            Log::info('ArtikelSeeder: File placeholder TinyMCE artikel dibuat langsung di storage.');
        }


        foreach ($artikelItems as $item) {
            $imagePathInStorage = null;
            $sourceImagePath = public_path($item['gambar_path_public']);

            if (file_exists($sourceImagePath)) {
                $fileContents = file_get_contents($sourceImagePath);
                $fileName = basename($item['gambar_path_public']);
                $uniqueFileName = uniqid() . '_' . $fileName;

                Storage::disk('public')->put($targetStorageFolder . '/' . $uniqueFileName, $fileContents);
                $imagePathInStorage = $targetStorageFolder . '/' . $uniqueFileName;
                Log::info('ArtikelSeeder: Gambar dummy artikel "' . $fileName . '" disalin ke storage: ' . $imagePathInStorage);
            } else {
                Log::warning('ArtikelSeeder: Gambar dummy artikel tidak ditemukan di public/: ' . $item['gambar_path_public'] . '. Menggunakan placeholder default.');
                $imagePathInStorage = $targetStorageFolder . '/' . $placeholderFileName;
            }

            // Untuk gambar di dalam isi TinyMCE (contoh-isi-merapi.jpg, contoh-isi-batik.jpg)
            // Anda perlu menyalinnya ke folder 'artikel_tinymce_uploads' jika belum ada
            if (Str::contains($item['isi'], '/storage/artikel_tinymce_uploads/')) {
                // Ekstrak nama file dari path dalam isi (misal: contoh-isi-merapi.jpg)
                preg_match('/\/storage\/artikel_tinymce_uploads\/([a-zA-Z0-9_\-.]+\.jpg)/', $item['isi'], $matches);
                $tinymceImageName = $matches[1] ?? null;

                if ($tinymceImageName) {
                    $sourceTinymceImagePath = public_path('images/' . $tinymceImageName); // Asumsi gambar TinyMCE juga ada di public/images/
                    if (file_exists($sourceTinymceImagePath)) {
                        Storage::disk('public')->put($tinymceStorageFolder . '/' . $tinymceImageName, file_get_contents($sourceTinymceImagePath));
                        Log::info('ArtikelSeeder: Gambar TinyMCE isi artikel "' . $tinymceImageName . '" disalin ke storage.');
                    } else {
                         Log::warning('ArtikelSeeder: Gambar TinyMCE isi tidak ditemukan di public/: ' . $sourceTinymceImagePath . '. Ini mungkin menyebabkan gambar tidak tampil di editor.');
                    }
                }
            }


            Artikel::firstOrCreate(
                ['judul' => $item['judul']],
                [
                    'gambar' => $imagePathInStorage,
                    'isi' => $item['isi'],
                    'kategori_artikel_id' => $item['kategori_artikel_id'],
                    'view_count' => $item['view_count'],
                ]
            );
        }
    }
}
