<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GaleriSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Ambil kategori yang sudah ada dari KategoriGaleriSeeder
        // Pastikan KategoriGaleriSeeder dijalankan DULUAN di DatabaseSeeder
        $kategoriAlam = KategoriGaleri::where('nama_kategori', 'Alam')->first();
        $kategoriBudaya = KategoriGaleri::where('nama_kategori', 'Budaya & Sejarah')->first();
        $kategoriEdukasi = KategoriGaleri::where('nama_kategori', 'Edukasi')->first();
        $kategoriKreatif = KategoriGaleri::where('nama_kategori', 'Kreatif')->first();
        $kategoriKulinerTradisional = KategoriGaleri::where('nama_kategori', 'Kuliner Tradisional')->first();
        $kategoriKulinerKekinian = KategoriGaleri::where('nama_kategori', 'Kuliner Kekinian')->first();

        // Data galeri yang akan di-seed
        $galeriItems = [
            [
                'judul' => 'Keindahan Pegunungan',
                'gambar_path_public' => 'images/merapi.jpg',
                'keterangan' => '<p>Pemandangan alam pegunungan yang menakjubkan.</p>',
                'kategori_galeri_id' => $kategoriAlam->id ?? null,
                'view_count' => 150,
            ],
            [
                'judul' => 'Tari Tradisional Jogja',
                'gambar_path_public' => 'images/ramayana.jpg',
                'keterangan' => '<p>Kelezatan gudeg khas Jogja yang manis dan gurih.</p>',
                'kategori_galeri_id' => $kategoriBudaya->id ?? null,
                'view_count' => 200,
            ],
            [
                'judul' => 'Belajar di Museum',
                'gambar_path_public' => 'images/sonobudoyo2.jpg',
                'keterangan' => '<p>Pengalaman edukasi di museum yang kaya sejarah.</p>',
                'kategori_galeri_id' => $kategoriEdukasi->id ?? null,
                'view_count' => 100,
            ],
            [
                'judul' => 'Karya Seni Lokal',
                'gambar_path_public' => 'images/artpaper.jpg',
                'keterangan' => '<p>Karya seni unik dari seniman lokal Jogja.</p>',
                'kategori_galeri_id' => $kategoriKreatif->id ?? null,
                'view_count' => 120,
            ],
            [
                'judul' => 'Kuliner Gudeg Jogja',
                'gambar_path_public' => 'images/gudeg.jpg',
                'keterangan' => '<p>Kelezatan gudeg khas Jogja yang manis dan gurih.</p>',
                'kategori_galeri_id' => $kategoriKulinerTradisional->id ?? null,
                'view_count' => 250,
            ],
            [
                'judul' => 'Es Krim Kekinian',
                'gambar_path_public' => 'images/tempogelato.jpg',
                'keterangan' => '<p>Es krim artisanal dengan rasa-rasa unik.</p>',
                'kategori_galeri_id' => $kategoriKulinerKekinian->id ?? null,
                'view_count' => 180,
            ],
        ];

        $targetStorageFolder = 'galeri';
        $placeholderFileName = 'placeholder.jpg';

        if (!Storage::disk('public')->exists($targetStorageFolder)) {
            Storage::disk('public')->makeDirectory($targetStorageFolder);
        }

        $placeholderContent = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAKAAAABACAYAAAD0o/E9AAAAAXNSR0IArs4c6QAAACtJREFUeJztwQEBAAAAgiD7pydLAAIAAAAAAAAAAAAAAAAAAAAAAOADwRkAAXh+Y4QAAAAASUVORK5CYII=');
        if (!Storage::disk('public')->exists($targetStorageFolder . '/' . $placeholderFileName)) {
            Storage::disk('public')->put($targetStorageFolder . '/' . $placeholderFileName, $placeholderContent);
            Log::info('GaleriSeeder: File placeholder dibuat langsung di storage.');
        }

        foreach ($galeriItems as $item) {
            $imagePathInStorage = null;
            $sourceImagePath = public_path($item['gambar_path_public']);

            if (file_exists($sourceImagePath)) {
                $fileContents = file_get_contents($sourceImagePath);
                $fileName = basename($item['gambar_path_public']);
                $uniqueFileName = uniqid() . '_' . $fileName;

                Storage::disk('public')->put($targetStorageFolder . '/' . $uniqueFileName, $fileContents);
                $imagePathInStorage = $targetStorageFolder . '/' . $uniqueFileName;
                Log::info('GaleriSeeder: Gambar dummy "' . $fileName . '" disalin ke storage: ' . $imagePathInStorage);
            } else {
                Log::warning('GaleriSeeder: Gambar dummy tidak ditemukan di public/: ' . $item['gambar_path_public'] . '. Menggunakan placeholder default.');
                $imagePathInStorage = $targetStorageFolder . '/' . $placeholderFileName;
            }

            Galeri::firstOrCreate(
                ['judul' => $item['judul']],
                [
                    'gambar' => $imagePathInStorage,
                    'keterangan' => $item['keterangan'],
                    'kategori_galeri_id' => $item['kategori_galeri_id'],
                    'view_count' => $item['view_count'],
                ]
            );
        }
    }
}
