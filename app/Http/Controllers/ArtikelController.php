<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel; // Pastikan model Artikel diimpor
use App\Models\KategoriArtikel; // Pastikan model KategoriArtikel diimpor
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException; // <--- PASTIKAN INI ADA DI SINI
use Illuminate\Support\Str; // <--- DAN INI ADA DI SINI

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar semua artikel.
     */
    public function index()
    {
        Log::info('ArtikelController@index: Mengambil daftar artikel.');
        // Mengambil data dari model Artikel, dengan eager load kategori, diurutkan berdasarkan tanggal terbaru
        $artikels = Artikel::with('kategoriArtikel')->orderBy('created_at', 'desc')->get();
        // Mengirim data ke view 'tambahartikel.index'
        return view('tambahartikel.index', compact('artikels'));
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        Log::info('ArtikelController@create: Menampilkan form tambah artikel.');
        // Ambil semua kategori artikel untuk dropdown
        $kategoriArtikels = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        // Mengirim kategori ke view 'tambahartikel.create'
        return view('tambahartikel.create', compact('kategoriArtikels'));
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        Log::info('ArtikelController@store: Memproses penyimpanan artikel baru.');
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar utama
            'isi' => 'nullable|string', // Kolom 'isi' untuk konten TinyMCE
            'kategori_artikel_id' => 'nullable|exists:kategori_artikels,id', // Validasi kategori
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke storage/app/public/artikel
            $path = $request->file('gambar')->store('artikel', 'public');
            Log::info('ArtikelController@store: Gambar utama disimpan di path: ' . $path);
        }

        try {
            // Buat entri artikel baru di database
            Artikel::create([
                'judul' => $validatedData['judul'],
                'gambar' => $path,
                'isi' => $validatedData['isi'],
                'kategori_artikel_id' => $validatedData['kategori_artikel_id'],
                'view_count' => 0, // Default view_count
            ]);
            Log::info('ArtikelController@store: Data artikel berhasil dibuat.');
            return redirect()->route('tambahartikel.index')->with('success', 'Data artikel berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('ArtikelController@store: Error saat membuat data artikel: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data artikel. Terjadi kesalahan.')->withInput();
        }
    }

    /**
     * Menampilkan detail satu artikel.
     * Menaikkan view_count setiap kali diakses.
     */
    public function show($id)
    {
        Log::info('ArtikelController@show: Mencoba mengambil artikel dengan ID: ' . $id);

        try {
            // Eager load relasi kategoriArtikel saat mencari artikel
            $artikel = Artikel::with('kategoriArtikel')->findOrFail($id); 
            
            Log::info('ArtikelController@show: Berhasil mengambil artikel ID: ' . $artikel->id . ' Judul: ' . $artikel->judul);

            // Menaikkan view_count
            try {
                $artikel->increment('view_count');
                $artikel->refresh(); // Refresh untuk mendapatkan view_count terbaru
                Log::info('ArtikelController@show: View count SETELAH increment dan refresh untuk Artikel ID ' . $artikel->id . ': ' . $artikel->view_count);
            } catch (\Exception $e) {
                Log::error('ArtikelController@show: Error saat increment view_count untuk Artikel ID ' . $artikel->id . ': ' . $e->getMessage());
            }

            return view('tambahartikel.show', compact('artikel'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ArtikelController@show: Artikel dengan ID ' . $id . ' tidak ditemukan. Error: ' . $e->getMessage());
            abort(404, 'Artikel tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('ArtikelController@show: Terjadi kesalahan umum saat mengambil artikel ID ' . $id . '. Error: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan server: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit artikel.
     */
    public function edit($id)
    {
        Log::info('ArtikelController@edit: Mencoba mengambil artikel dengan ID: ' . $id);

        try {
            $artikel = Artikel::with('kategoriArtikel')->findOrFail($id); 
            $kategoriArtikels = KategoriArtikel::orderBy('nama_kategori', 'asc')->get(); // Ambil kategori
            
            Log::info('ArtikelController@edit: Berhasil mengambil artikel ID: ' . $artikel->id . ' Judul: ' . $artikel->judul);
            return view('tambahartikel.create', compact('artikel', 'kategoriArtikels'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ArtikelController@edit: Artikel dengan ID ' . $id . ' tidak ditemukan. Error: ' . $e->getMessage());
            abort(404, 'Artikel tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('ArtikelController@edit: Terjadi kesalahan umum saat mengambil artikel ID ' . $id . '. Error: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan server: ' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data artikel di database.
     */
    public function update(Request $request, $id)
    {
        Log::info('ArtikelController@update: Memproses update untuk Artikel ID: ' . $id);

        try {
            $artikel = Artikel::findOrFail($id);
            
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isi' => 'nullable|string',
                'kategori_artikel_id' => 'nullable|exists:kategori_artikels,id',
            ]);

            Log::info('ArtikelController@update: Validasi berhasil.');

            $dataToUpdate = [
                'judul' => $validatedData['judul'],
                'isi' => $validatedData['isi'],
                'kategori_artikel_id' => $validatedData['kategori_artikel_id'],
            ];

            if ($request->hasFile('gambar')) {
                if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                    Storage::disk('public')->delete($artikel->gambar);
                    Log::info('ArtikelController@update: Gambar lama (' . $artikel->gambar . ') dihapus.');
                }
                $dataToUpdate['gambar'] = $request->file('gambar')->store('artikel', 'public');
                Log::info('ArtikelController@update: Gambar baru disimpan di path: ' . $dataToUpdate['gambar']);
            }

            $artikel->update($dataToUpdate);
            Log::info('ArtikelController@update: Data artikel berhasil diperbarui untuk ID: ' . $artikel->id);
            return redirect()->route('tambahartikel.index')->with('success', 'Data artikel berhasil diperbarui.');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ArtikelController@update: Artikel dengan ID ' . $id . ' tidak ditemukan saat update. Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Artikel tidak ditemukan. Gagal memperbarui.')->withInput();
        } catch (\Exception $e) {
            Log::error('ArtikelController@update: Error saat memperbarui data artikel ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data artikel. Terjadi kesalahan.')->withInput();
        }
    }

    /**
     * Menghapus data artikel dari database.
     */
    public function destroy($id) // <--- GANTI INI DARI (Artikel $artikel) KE ($id)
    {
        Log::info('ArtikelController@destroy: Memproses penghapusan untuk Artikel ID: ' . $id);
        try {
            // Coba ambil artikel secara eksplisit menggunakan findOrFail
            $artikel = Artikel::findOrFail($id); // Ini akan melempar ModelNotFoundException (404) jika tidak ada

            // --- BARIS DEBUG INI ---
            // dd($artikel); // <-- Tambahkan dd() ini untuk melihat objek artikel yang ditemukan
            // --- HAPUS BARIS INI SETELAH SELESAI DEBUGGING ---

            // Hapus gambar utama dari storage jika ada
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
                Log::info('ArtikelController@destroy: Gambar utama (' . $artikel->gambar . ') dihapus manual.');
            }

            // Hapus record artikel dari database
            $artikel->delete();
            Log::info('ArtikelController@destroy: Data artikel berhasil dihapus untuk ID: ' . $artikel->id);
            return redirect()->route('tambahartikel.index')->with('success', 'Data artikel berhasil dihapus.');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ArtikelController@destroy: Artikel dengan ID ' . $id . ' tidak ditemukan saat mencoba menghapus. Error: ' . $e->getMessage());
            return redirect()->route('tambahartikel.index')->with('error', 'Artikel tidak ditemukan. Gagal menghapus.');
        } catch (QueryException $e) {
            $errorMessage = $e->getMessage();
            Log::error('ArtikelController@destroy: QueryException saat menghapus artikel ID ' . $id . ': ' . $errorMessage);

            if (Str::contains($errorMessage, ['Integrity constraint violation', 'SQLSTATE[23000]'])) {
                return redirect()->route('tambahartikel.index')->with('error', 'Gagal menghapus artikel: Terdapat data terkait (misalnya, komentar, tag, atau data lain yang merujuk artikel ini) yang harus dihapus terlebih dahulu.');
            }

            return redirect()->route('tambahartikel.index')->with('error', 'Gagal menghapus artikel. Terjadi kesalahan database: ' . $errorMessage);

        } catch (\Exception $e) {
            Log::error('ArtikelController@destroy: Error umum saat menghapus data artikel ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('tambahartikel.index')->with('error', 'Gagal menghapus data artikel. Terjadi kesalahan tak terduga.');
        }
    }

    /**
     * Method untuk mengunggah gambar dari TinyMCE editor untuk artikel.
     */
    public function uploadTinymceImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Max 5MB
        ]);

        if ($request->hasFile('file')) {
            // Simpan gambar ke storage/app/public/artikel_tinymce_uploads
            $path = $request->file('file')->store('artikel_tinymce_uploads', 'public');
            Log::info('ArtikelController@uploadTinymceImage: Gambar TinyMCE disimpan di path: ' . $path);
            // Mengembalikan respons JSON dalam format yang diharapkan TinyMCE
            return response()->json(['location' => asset('storage/' . $path)]);
        }

        Log::error('ArtikelController@uploadTinymceImage: Tidak ada gambar yang diunggah.');
        return response()->json(['error' => 'No image uploaded.'], 400);
    }
}
