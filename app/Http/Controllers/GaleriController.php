<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KategoriGaleri; // Pastikan model ini ada dan di-import
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;     // Untuk logging

class GaleriController extends Controller
{
    /**
     * Menampilkan daftar semua galeri.
     */
    public function index()
    {
        Log::info('GaleriController@index: Mengambil daftar galeri.');
        $galeris = Galeri::with('kategoriGaleri')->orderBy('created_at', 'desc')->get();
        return view('tambahgaleri.index', compact('galeris'));
    }

    /**
     * Menampilkan form untuk membuat galeri baru.
     */
    public function create()
    {
        Log::info('GaleriController@create: Menampilkan form tambah galeri.');
        $kategoriGaleris = KategoriGaleri::orderBy('nama_kategori', 'asc')->get();
        return view('tambahgaleri.create', compact('kategoriGaleris'));
    }

    /**
     * Menyimpan galeri baru ke database.
     */
    public function store(Request $request)
    {
        Log::info('GaleriController@store: Memproses penyimpanan galeri baru.');
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'nullable|string', // Pertimbangkan untuk mengubah validasi ini jika kolom keterangan sudah MEDIUMTEXT/LONGTEXT
            'kategori_galeri_id' => 'nullable|exists:kategori_galeris,id',
            // 'status' => 'required|string', // Aktifkan jika Anda menggunakan status
        ]);

        Log::info('GaleriController@store: Validasi berhasil.');

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('galeri', 'public'); // Simpan ke storage/app/public/galeri
            Log::info('GaleriController@store: Gambar utama disimpan di path: ' . $path);
        }

        try {
            Galeri::create([
                'judul' => $validatedData['judul'],
                'gambar' => $path,
                'keterangan' => $validatedData['keterangan'], // Pertimbangkan sanitasi HTML di sini jika belum
                'kategori_galeri_id' => $validatedData['kategori_galeri_id'],
                // 'status' => $validatedData['status'],
                // 'view_count' akan default ke 0 berdasarkan migrasi
            ]);
            Log::info('GaleriController@store: Data galeri berhasil dibuat.');
            return redirect()->route('tambahgaleri.index')->with('success', 'Data galeri berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('GaleriController@store: Error saat membuat data galeri: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data galeri. Terjadi kesalahan.')->withInput();
        }
    }

    /**
     * Menampilkan detail satu galeri.
     * Menaikkan view_count setiap kali diakses.
     */
    public function show(Galeri $tambahgaleri) // Menggunakan route model binding $tambahgaleri
    {
            // dd($tambahgaleri); // Tambahkan baris ini
    Log::info('-------------------------------------------');
    Log::info('GaleriController@show: Memulai untuk Galeri ID: ' . $tambahgaleri->id);
    // ... sisa kode Anda
        Log::info('-------------------------------------------');
        Log::info('GaleriController@show: Memulai untuk Galeri ID: ' . $tambahgaleri->id);

        // Pastikan $tambahgaleri adalah instance Galeri yang valid dan ada di database
        // Route Model Binding seharusnya sudah menangani ini, tapi pengecekan tambahan tidak ada salahnya
        if (!$tambahgaleri || !$tambahgaleri->exists) {
            Log::error('GaleriController@show: Objek $tambahgaleri tidak valid atau tidak ditemukan untuk ID yang diminta.');
            abort(404, 'Data galeri tidak ditemukan.');
        }

        Log::info('GaleriController@show: View count SEBELUM increment untuk Galeri ID ' . $tambahgaleri->id . ': ' . $tambahgaleri->view_count);

        try {
            // NAIKKAN VIEW_COUNT DI SINI
            $affectedRows = $tambahgaleri->increment('view_count');
            Log::info('GaleriController@show: Hasil dari increment("view_count") (affected rows): ' . $affectedRows);

            // Memuat ulang atribut model dari database untuk mendapatkan nilai view_count terbaru.
            $tambahgaleri->refresh();

            Log::info('GaleriController@show: View count SETELAH increment dan refresh untuk Galeri ID ' . $tambahgaleri->id . ': ' . $tambahgaleri->view_count);

        } catch (\Exception $e) {
            Log::error('GaleriController@show: Error saat mencoba increment view_count untuk Galeri ID ' . $tambahgaleri->id . ': ' . $e->getMessage());
            // Tetap lanjutkan untuk menampilkan halaman meskipun increment gagal (opsional, tergantung kebutuhan)
        }

        // Eager load relasi kategori jika belum di-load
        try {
            $tambahgaleri->loadMissing('kategoriGaleri');
            Log::info('GaleriController@show: Relasi kategoriGaleri berhasil di-load (atau sudah ada).');
        } catch (\Exception $e) {
            Log::error('GaleriController@show: Error saat load relasi kategoriGaleri untuk Galeri ID ' . $tambahgaleri->id . ': ' . $e->getMessage());
        }

        Log::info('GaleriController@show: Mengirim data ke view tambahgaleri.show dengan view_count: ' . $tambahgaleri->view_count);
        Log::info('-------------------------------------------');

        // Kirim data galeri yang sudah diupdate (termasuk view_count baru) ke view
        return view('tambahgaleri.show', ['galeri' => $tambahgaleri]);
    }

    /**
     * Menampilkan form untuk mengedit galeri.
     */
    public function edit(Galeri $tambahgaleri) // Menggunakan $tambahgaleri
    {
        Log::info('GaleriController@edit: Menampilkan form edit untuk Galeri ID: ' . $tambahgaleri->id);
        $kategoriGaleris = KategoriGaleri::orderBy('nama_kategori', 'asc')->get();
        return view('tambahgaleri.create', ['galeri' => $tambahgaleri, 'kategoriGaleris' => $kategoriGaleris]);
    }

    /**
     * Memperbarui data galeri di database.
     */
    public function update(Request $request, Galeri $tambahgaleri) // Menggunakan $tambahgaleri
    {
        Log::info('GaleriController@update: Memproses update untuk Galeri ID: ' . $tambahgaleri->id);
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar nullable saat update
            'keterangan' => 'nullable|string', // Pertimbangkan validasi panjang jika perlu, meskipun kolom sudah besar
            'kategori_galeri_id' => 'nullable|exists:kategori_galeris,id',
            // 'status' => 'required|string',
        ]);
        Log::info('GaleriController@update: Validasi berhasil.');

        $dataToUpdate = [
            'judul' => $validatedData['judul'],
            'keterangan' => $validatedData['keterangan'], // Pertimbangkan sanitasi HTML di sini jika belum
            'kategori_galeri_id' => $validatedData['kategori_galeri_id'],
            // 'status' => $validatedData['status'],
        ];

        if ($request->hasFile('gambar')) {
            if ($tambahgaleri->gambar && Storage::disk('public')->exists($tambahgaleri->gambar)) {
                Storage::disk('public')->delete($tambahgaleri->gambar);
                Log::info('GaleriController@update: Gambar lama (' . $tambahgaleri->gambar . ') dihapus.');
            }
            $dataToUpdate['gambar'] = $request->file('gambar')->store('galeri', 'public');
            Log::info('GaleriController@update: Gambar baru disimpan di path: ' . $dataToUpdate['gambar']);
        }

        try {
            $tambahgaleri->update($dataToUpdate);
            Log::info('GaleriController@update: Data galeri berhasil diperbarui untuk ID: ' . $tambahgaleri->id);
            return redirect()->route('tambahgaleri.index')->with('success', 'Data galeri berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('GaleriController@update: Error saat memperbarui data galeri ID ' . $tambahgaleri->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data galeri. Terjadi kesalahan.')->withInput();
        }
    }

    /**
     * Menghapus data galeri dari database.
     */

        public function uploadTinymceImage(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Max 5MB
        ]);

        if ($request->hasFile('file')) {
            // Simpan gambar ke storage/app/public/galeri_tinymce_uploads
            $path = $request->file('file')->store('galeri_tinymce_uploads', 'public');
            Log::info('GaleriController@uploadTinymceImage: Gambar TinyMCE disimpan di path: ' . $path);
            // Mengembalikan respons JSON dalam format yang diharapkan TinyMCE
            return response()->json(['location' => asset('storage/' . $path)]);
        }

        Log::error('GaleriController@uploadTinymceImage: Tidak ada gambar yang diunggah.');
        return response()->json(['error' => 'No image uploaded.'], 400);
    }
    public function destroy(Galeri $tambahgaleri) // Menggunakan $tambahgaleri
    {
        Log::info('GaleriController@destroy: Memproses penghapusan untuk Galeri ID: ' . $tambahgaleri->id);
        try {
            // Hapus gambar utama dari storage
            if ($tambahgaleri->gambar && Storage::disk('public')->exists($tambahgaleri->gambar)) {
                 Storage::disk('public')->delete($tambahgaleri->gambar);
                 Log::info('GaleriController@destroy: Gambar utama (' . $tambahgaleri->gambar . ') dihapus manual.');
            }
            // Perlu diperhatikan: gambar yang disisipkan di TinyMCE (jika disimpan sebagai file terpisah)
            // tidak akan otomatis terhapus dengan logika ini.
            // Anda memerlukan mekanisme tambahan jika ingin menghapus gambar-gambar tersebut
            // saat galeri dihapus (misalnya, parsing HTML keterangan dan menghapus file satu per satu).

            $tambahgaleri->delete();
            Log::info('GaleriController@destroy: Data galeri berhasil dihapus untuk ID: ' . $tambahgaleri->id);
            return redirect()->route('tambahgaleri.index')->with('success', 'Data galeri berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('GaleriController@destroy: Error saat menghapus data galeri ID ' . $tambahgaleri->id . ': ' . $e->getMessage());
            return redirect()->route('tambahgaleri.index')->with('error', 'Gagal menghapus data galeri. Terjadi kesalahan.');
        }
    }
}
