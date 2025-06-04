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

Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/galeri/alam', function () {
    return view('galeri.alam');  
})->name('galeri.alam'); 

// routes/web.php

Route::get('/galeri/budaya-sejarah', function () { // Ganti '&' di URL path
    return view('galeri.budaya-sejarah');           // Ganti '&' di nama view dan tambahkan subfolder 'galeri'
})->name('galeri.budaya-sejarah');                

//--------------------------------//
Route::get('/kuliner/berat', function () {
    return view('kuliner.berat');
})->name('kuliner.berat');

Route::get('/kuliner/ringan', function () {
    return view('kuliner.ringan');
})->name('kuliner.ringan');

Route::get('/destinasi/bantul', function () {
    return view('destinasi.bantul');
});

Route::get('/destinasi/gunungkidul', function () {
    return view('destinasi.gunungkidul');
});

Route::get('/destinasi/kulonprogo', function () {
    return view('destinasi.kulonprogo');
});

Route::get('/destinasi/sleman', function () {
    return view('destinasi.sleman');
});

Route::get('/destinasi/yogyakarta', function () {
    return view('destinasi.yogyakarta');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/geplak', function () {
    return view('geplak');
});




require __DIR__.'/auth.php';
