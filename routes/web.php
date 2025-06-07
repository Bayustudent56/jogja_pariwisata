<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; // Pastikan ini ada dan benar
use App\Http\Controllers\GaleriController; // Impor GaleriController
use App\Http\Controllers\ArtikelController; // Impor ArtikelController
use App\Http\Controllers\PublicController; // <--- TAMBAHKAN BARIS INI


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Rute untuk halaman depan (publik) - Menunjuk ke PublicController@berandaIndex
// Route::get('/', [PublicController::class, 'berandaIndex'])->name('beranda');
// // Rute untuk halaman depan (publik)
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

// === HALAMAN PUBLIK (USER) ===
// Halaman Galeri Publik (menampilkan KATEGORI GALERI)
Route::get('/galeri', [PublicController::class, 'galeriIndex'])->name('galeri.public');
// Halaman Daftar GALERI per Kategori (Publik)
Route::get('/galeri/kategori/{slug}', [PublicController::class, 'galleriesByCategory'])->name('galeri.by.category.public');
// Halaman Detail GALERI Publik
Route::get('/galeri/{slug}', [PublicController::class, 'showGalleryPublic'])->name('galeri.show.public');

// Halaman Artikel Publik (menampilkan KATEGORI ARTIKEL)
// Hapus semua definisi rute '/artikel' atau name 'artikel.public' yang lain jika ada
Route::get('/artikel', [PublicController::class, 'artikelIndex'])->name('artikel.public'); // <--- PASTIKAN INI ADALAH SATU-SATUNYA

// Halaman Daftar ARTIKEL per Kategori (Publik)
Route::get('/artikel/kategori/{slug}', [PublicController::class, 'articlesByCategory'])->name('artikel.by.category.public');
// Halaman Detail ARTIKEL Publik
Route::get('/artikel/{slug}', [PublicController::class, 'showArticlePublic'])->name('artikel.show.public');

// Route::get('/galeri', function () {
//     // Jika Anda ingin menampilkan daftar galeri publik di sini, Anda bisa panggil controller
//     // return (new GaleriController())->indexPublic(); // Contoh jika Anda punya method indexPublic
//     return view('galeri'); // atau tetap tampilkan view statis
// })->name('galeri.public'); // Beri nama yang jelas jika ini untuk publik

// Route::get('/artikel', function () {
//     // Jika Anda ingin menampilkan daftar artikel publik di sini
//     // return (new ArtikelController())->indexPublic(); // Contoh
//     return view('artikel'); // atau tetap tampilkan view statis
// })->name('artikel.public'); // Beri nama yang jelas jika ini untuk publik

Route::get('/geplak', function () {
    return view('geplak');
})->name('geplak'); // Beri nama rute ini jika sering digunakan

// Route bawaan Breeze untuk dashboard pengguna biasa setelah login
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') { // Pastikan user login dan punya role 'admin'
        return redirect()->route('admin.dashboard');
    }
    return view('beranda'); // Default untuk user biasa atau jika role tidak 'admin'
})->middleware(['auth', 'verified'])->name('dashboard');

// === ADMIN PANEL ROUTES ===
// Semua rute di sini memerlukan autentikasi dan verifikasi email (opsional)
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Rute Profil Bawaan Breeze (pindahkan ke dalam grup auth)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- MANAJEMEN GALERI ---
    // Gunakan 'tambahgaleri' sebagai resource name untuk konsistensi
    Route::resource('tambahgaleri', GaleriController::class);
    // Rute khusus untuk upload gambar TinyMCE untuk galeri
    Route::post('tambahgaleri/tinymce-upload', [GaleriController::class, 'uploadTinymceImage'])->name('tambahgaleri.tinymce.upload');

    // --- MANAJEMEN ARTIKEL ---
    // Gunakan 'tambahartikel' sebagai resource name
    Route::resource('tambahartikel', ArtikelController::class);
    // Rute khusus untuk upload gambar TinyMCE untuk artikel
    Route::post('tambahartikel/tinymce-upload', [ArtikelController::class, 'uploadTinymceImage'])->name('tambahartikel.tinymce.upload');

    // HAPUS RUTE DUPLIKAT DAN SALAH SEPERTI DI BAWAH INI:
    // Route::resource('/artikel', \App\Http\Controllers\GaleriController::class); // Ini duplikat
    // Route::resource('/tambahartikel', \App\Http\Controllers\GaleriController::class); // Ini juga duplikat dan salah controller
});


// Rute Autentikasi Breeze (Login, Register, Reset Password, dll.)
require __DIR__.'/auth.php';

