<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Penting: Pastikan ini ada untuk objek tanggal
// use App\Models\Galeri; // Contoh jika Anda memiliki model Galeri (uncomment jika digunakan)
// use App\Models\Artikel; // Contoh jika Anda memiliki model Artikel (uncomment jika digunakan)
// use App\Models\KategoriGaleri; // Contoh (uncomment jika digunakan)
// use App\Models\KategoriArtikel; // Contoh (uncomment jika digunakan)


class PublicController extends Controller
{
    // --- Metode untuk Halaman Galeri Publik (Asumsi ini ada di PublicController Anda) ---
    public function galeriIndex()
    {
        // Logika untuk menampilkan kategori galeri atau daftar galeri utama
        // Contoh: $kategoriGaleri = KategoriGaleri::all();
        return view('galeri'); // Asumsi view galeri.blade.php Anda
    }

    public function galleriesByCategory($slug)
    {
        // Logika untuk menampilkan galeri per kategori
        // Contoh: $category = KategoriGaleri::where('slug', $slug)->firstOrFail();
        // $galleries = $category->galeries()->get();
        return view('galeri_by_category'); // Asumsi view Anda
    }

    public function showGalleryPublic($slug)
    {
        // Logika untuk menampilkan detail galeri
        // Contoh: $galeri = Galeri::where('slug', $slug)->firstOrFail();
        // return view('galeri_detail', compact('galeri'));
        return view('galeri_detail'); // Asumsi view Anda
    }

    // --- Metode untuk Halaman Artikel Publik (Asumsi ini ada di PublicController Anda) ---
    public function artikelIndex()
    {
        // Logika untuk menampilkan kategori artikel atau daftar artikel utama
        // Contoh: $kategoriArtikel = KategoriArtikel::all();
        return view('artikel'); // Asumsi view artikel.blade.php Anda
    }

    public function articlesByCategory($slug)
    {
        // Logika untuk menampilkan artikel per kategori
        // Contoh: $category = KategoriArtikel::where('slug', $slug)->firstOrFail();
        // $articles = $category->articles()->get();
        return view('artikel_by_category'); // Asumsi view Anda
    }

    public function showArticlePublic($slug)
    {
        // Logika untuk menampilkan detail artikel
        // Contoh: $artikel = Artikel::where('slug', $slug)->firstOrFail();
        // return view('artikel_detail', compact('artikel'));
        return view('artikel_detail'); // Asumsi view Anda
    }

    // =========================================================================
    // METODE BARU UNTUK HALAMAN KABUPATEN/KOTA YOGYAKARTA
    // Ini adalah kode yang saya buat untuk kebutuhan Anda
    // =========================================================================
    public function showDaerahDetail(Request $request)
    {
        // Mengambil slug dari URL rute yang cocok
        // Misalnya, jika URL adalah /sleman, maka slug akan 'sleman'
        // Jika URL adalah /kota-yogyakarta, maka slug akan 'kota-yogyakarta'
        $slug = $request->route()->uri(); // Mengambil seluruh URI seperti 'sleman' atau 'kota-yogyakarta'

        // Pastikan untuk menghapus '/' di awal jika ada
        if (substr($slug, 0, 1) === '/') {
            $slug = substr($slug, 1);
        }

        // Data dummy untuk setiap kabupaten/kota
        // PENTING: Anda bisa mengganti ini nanti dengan mengambil data dari database jika ada model Daerah
        $dataDaerah = [
            'sleman' => [
                'judul' => 'Sleman: Pesona Gunung Merapi dan Perbukitan',
                'gambar' => 'images/sleman_header.jpg', // Ganti dengan PATH GAMBAR yang sesuai di public/storage
                'isi' => '<p>Sleman, kabupaten yang terletak di bagian utara Daerah Istimewa Yogyakarta, terkenal dengan pemandangan Gunung Merapi yang megah dan area perbukitan yang hijau. Destinasi populer di Sleman meliputi Kaliurang, Museum Gunung Merapi, dan berbagai kebun buah.</p><p>Selain itu, Sleman juga dikenal sebagai pusat pendidikan dengan banyak universitas ternama. Kehidupan di Sleman menawarkan perpaduan antara nuansa pedesaan yang tenang dan fasilitas kota yang modern.</p>',
                'created_at' => Carbon::parse('2024-05-10'),
                'kategori_artikel' => [
                    'nama_kategori' => 'Kabupaten',
                    'slug' => 'kabupaten'
                ],
                'view_count' => 1250,
            ],
            'kulonprogo' => [
                'judul' => 'Kulon Progo: Keindahan Perbukitan Menoreh dan Pantai Selatan',
                'gambar' => 'images/kulonprogo_header.jpg', // Ganti dengan PATH GAMBAR yang sesuai
                'isi' => '<p>Kulon Progo berada di bagian barat Yogyakarta, menawarkan pesona alam yang didominasi oleh Pegunungan Menoreh. Daerah ini juga memiliki garis pantai selatan yang indah, dengan pantai-pantai seperti Glagah dan Congot.</p><p>Kulon Progo sedang berkembang pesat dengan adanya Bandara Internasional Yogyakarta (YIA) yang menjadi gerbang utama menuju Yogyakarta. Potensi wisata alam dan budaya di Kulon Progo sangat besar.</p>',
                'created_at' => Carbon::parse('2024-06-01'),
                'kategori_artikel' => [
                    'nama_kategori' => 'Kabupaten',
                    'slug' => 'kabupaten'
                ],
                'view_count' => 980,
            ],
            'bantul' => [
                'judul' => 'Bantul: Pesona Pantai, Seni, dan Budaya',
                'gambar' => 'images/bantul_header.jpg', // Ganti dengan PATH GAMBAR yang sesuai
                'isi' => '<p>Bantul, terletak di selatan Yogyakarta, terkenal dengan deretan pantainya yang eksotis seperti Parangtritis, Depok, dan Samas. Selain itu, Bantul juga merupakan pusat kerajinan seni dan budaya, dengan banyak galeri seni dan sentra kerajinan.</p><p>Desa wisata seperti Kasongan dan Imogiri menawarkan pengalaman budaya yang kaya, menjadikannya destinasi favorit bagi pecinta seni dan alam.</p>',
                'created_at' => Carbon::parse('2024-05-20'),
                'kategori_artikel' => [
                    'nama_kategori' => 'Kabupaten',
                    'slug' => 'kabupaten'
                ],
                'view_count' => 1500,
            ],
            'gunungkidul' => [
                'judul' => 'Gunungkidul: Keindahan Pantai Pasir Putih dan Gua Karst',
                'gambar' => 'images/gunungkidul_header.jpg', // Ganti dengan PATH GAMBAR yang sesuai
                'isi' => '<p>Gunungkidul, di tenggara Yogyakarta, memukau dengan pantai-pantai berpasir putihnya yang indah seperti Baron, Krakal, Indrayanti, dan Jogan. Topografi karstnya juga menciptakan formasi gua-gua menakjubkan seperti Gua Pindul dan Jomblang.</p><p>Wisata petualangan dan keindahan alam menjadi daya tarik utama Gunungkidul, cocok bagi mereka yang mencari pengalaman berbeda di Yogyakarta.</p>',
                'created_at' => Carbon::parse('2024-05-15'),
                'kategori_artikel' => [
                    'nama_kategori' => 'Kabupaten',
                    'slug' => 'kabupaten'
                ],
                'view_count' => 2100,
            ],
            'kota-yogyakarta' => [ // Perhatikan slug menggunakan hyphen (-)
                'judul' => 'Kota Yogyakarta: Pusat Budaya, Sejarah, dan Pendidikan',
                'gambar' => 'images/kotajogja_header.jpg', // Ganti dengan PATH GAMBAR yang sesuai
                'isi' => '<p>Kota Yogyakarta adalah jantung Daerah Istimewa Yogyakarta, tempat di mana tradisi Jawa dan modernitas bertemu. Dikenal dengan Keraton Yogyakarta, Malioboro, dan berbagai situs bersejarah lainnya, kota ini adalah magnet bagi wisatawan.</p><p>Sebagai kota pelajar, Yogyakarta juga memiliki banyak universitas dan kehidupan malam yang semarak, menawarkan pengalaman yang tak terlupakan bagi setiap pengunjung.</p>',
                'created_at' => Carbon::parse('2024-04-25'),
                'kategori_artikel' => [
                    'nama_kategori' => 'Kota',
                    'slug' => 'kota'
                ],
                'view_count' => 3000,
            ],
        ];

        // Pastikan slug yang diminta ada dalam data dummy
        if (!isset($dataDaerah[$slug])) {
            abort(404); // Tampilkan halaman 404 jika slug tidak ditemukan
        }

        // Ambil data untuk slug yang sesuai
        $data = $dataDaerah[$slug];

        // Konversi array data menjadi objek untuk memudahkan akses di Blade
        // Mirip seperti hasil query Eloquent, sehingga cocok dengan @section('title', $artikel->judul)
        $artikel = (object) [
            'judul' => $data['judul'],
            'gambar' => $data['gambar'],
            'isi' => $data['isi'],
            'created_at' => $data['created_at'],
            'kategoriArtikel' => (object) $data['kategori_artikel'], // Kategori juga diubah jadi objek
            'view_count' => $data['view_count'],
            'slug' => $slug, // Tambahkan slug agar bisa digunakan di Blade jika diperlukan
        ];

        // Tampilkan view artikel_detail.blade.php dengan data yang sudah disiapkan
        // Asumsi file artikel_detail.blade.php adalah tempat Anda menampilkan detail artikel
        return view('artikel_detail', compact('artikel'));
    }
}