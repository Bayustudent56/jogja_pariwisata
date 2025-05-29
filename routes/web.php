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

// routes/web.php

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita/terkini', function () {
    return view('berita.terkini');
});

Route::get('/berita/destinasi', function () {
    return view('berita.destinasi');
});

Route::get('/berita/kuliner', function () {
    return view('berita.kuliner');
});

Route::get('/destinasi', function () {
    return view('destinasi');
});

Route::get('/kuliner', function () {
    return view('kuliner');
});


require __DIR__.'/auth.php';
