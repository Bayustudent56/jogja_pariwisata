<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TinyMceUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:204800', // Sesuaikan validasi ukuran
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid('tinymce_img_') . '.' . $file->getClientOriginalExtension();
            // Simpan ke 'storage/app/public/uploads/tinymce_images'
            $path = $file->storeAs('public/uploads/tinymce_images', $fileName);

            if ($path) {
                // Mengembalikan URL publik yang benar
                return response()->json(['location' => Storage::url(str_replace('public/', '', $path))]);
            } else {
                return response()->json(['error' => 'Gagal menyimpan gambar.'], 500);
            }
        }
        return response()->json(['error' => 'Tidak ada file yang diunggah.'], 400);
    }
}
