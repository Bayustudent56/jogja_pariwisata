<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriGaleri;
use App\Models\Galeri;
use App\Models\KategoriArtikel;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{
    /**
     * Menampilkan halaman galeri publik dengan daftar KATEGORI GALERI.
     * URL: /galeri
     */
    public function galeriIndex()
    {
    // --- BARIS DEBUG INI ---
        // dd('Controller galeriIndex dipanggil!', KategoriGaleri::orderBy('nama_kategori', 'asc')->get());
                // --- HAPUS BARIS INI SETELAH SELESAI DEBUGGING ---

        Log::info('PublicController@galeriIndex: Mengambil daftar kategori galeri.');
        $kategoriGaleris = KategoriGaleri::orderBy('nama_kategori', 'asc')->get();
        return view('galeri', compact('kategoriGaleris'));
    }

    /**
     * Menampilkan daftar GALERI berdasarkan KATEGORI GALERI.
     * URL: /galeri/kategori/{slug}
     */
    public function galleriesByCategory($slug)
    {
        Log::info('PublicController@galleriesByCategory: Mengambil galeri berdasarkan kategori slug: ' . $slug);
        $kategori = KategoriGaleri::where('slug', $slug)->firstOrFail();

        $galeris = Galeri::where('kategori_galeri_id', $kategori->id)
                           ->with('kategoriGaleri')
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('galeri_by_category', compact('kategori', 'galeris'));
    }

    /**
     * Menampilkan detail GALERI untuk tampilan publik.
     * URL: /galeri/{slug}
     */
    public function showGalleryPublic($slug)
    {
        Log::info('PublicController@showGalleryPublic: Mengambil detail galeri dengan slug: ' . $slug);
        $galeri = Galeri::where('slug', $slug)
                        ->with('kategoriGaleri')
                        ->firstOrFail();

        try {
            $galeri->increment('view_count');
            $galeri->refresh();
        } catch (\Exception $e) {
            Log::error('PublicController@showGalleryPublic: Gagal increment view_count untuk galeri ID ' . $galeri->id . ': ' . $e->getMessage());
        }

        return view('galeri_detail', compact('galeri'));
    }

    /**
     * Menampilkan halaman artikel publik dengan daftar KATEGORI ARTIKEL.
     * URL: /artikel
     */
    public function artikelIndex()
    {
        Log::info('PublicController@artikelIndex: Mengambil daftar kategori artikel.');
        $kategoriArtikels = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        return view('artikel', compact('kategoriArtikels'));
    }

    /**
     * Menampilkan daftar ARTIKEL berdasarkan KATEGORI ARTIKEL.
     * URL: /artikel/kategori/{slug}
     */
    public function articlesByCategory($slug)
    {
        Log::info('PublicController@articlesByCategory: Mengambil artikel berdasarkan kategori slug: ' . $slug);
        $kategori = KategoriArtikel::where('slug', $slug)->firstOrFail();

        $artikels = Artikel::where('kategori_artikel_id', $kategori->id)
                            ->with('kategoriArtikel')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('artikel_by_category', compact('kategori', 'artikels'));
    }

    /**
     * Menampilkan detail ARTIKEL untuk tampilan publik.
     * URL: /artikel/{slug}
     */
    public function showArticlePublic($slug)
    {
        Log::info('PublicController@showArticlePublic: Mengambil detail artikel dengan slug: ' . $slug);
        $artikel = Artikel::where('slug', $slug)
                           ->with('kategoriArtikel')
                           ->firstOrFail();

        try {
            $artikel->increment('view_count');
            $artikel->refresh();
        } catch (\Exception $e) {
            Log::error('PublicController@showArticlePublic: Gagal increment view_count untuk artikel ID ' . $artikel->id . ': ' . $e->getMessage());
        }

        return view('artikel_detail', compact('artikel'));
    }
}
