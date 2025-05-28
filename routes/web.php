<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita/{kategori?}', function ($kategori = null) {
    return view('berita', ['kategori' => $kategori]);
});

Route::get('/destinasi/{lokasi?}', function ($lokasi = null) {
    return view('destinasi', ['lokasi' => $lokasi]);
});

Route::get('/kuliner/{lokasi?}', function ($lokasi = null) {
    return view('kuliner', ['lokasi' => $lokasi]);
});


require __DIR__.'/auth.php';
