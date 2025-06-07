@extends('layouts.admin')

@section('title', isset($galeri) ? 'Edit Galeri: ' . $galeri->judul : 'Tambah Galeri Baru')

@push('styles')

    {{-- PASTIKAN INI ADA DAN API KEY SUDAH DIGANTI! Ini krusial untuk TinyMCE --}}
    {{-- <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    {{-- Penting: Ganti 'YOUR_API_KEY' dengan kunci API TinyMCE Anda yang sebenarnya.
         Anda bisa mendaftar gratis di TinyMCE Cloud (tinymce.com) untuk mendapatkan kunci.
         Tanpa kunci ini, editor mungkin tidak berfungsi dengan baik atau muncul watermark. --}}
@endpush

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">
        {{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}
    </h2>

    {{-- Pesan Error Validasi Laravel --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Oops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Pesan Error atau Success dari Controller --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <form action="{{ isset($galeri) ? route('tambahgaleri.update', ['tambahgaleri' => $galeri->id]) : route('tambahgaleri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($galeri))
            @method('PUT')
        @endif

        {{-- Field Judul --}}
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $galeri->judul ?? '') }}" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Field Kategori Galeri --}}
        <div class="mb-4">
            <label for="kategori_galeri_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori Galeri</label>
            <select name="kategori_galeri_id" id="kategori_galeri_id" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Kategori --</option>
                {{-- Menggunakan @forelse untuk menangani kasus $kategoriGaleris kosong --}}
                @forelse($kategoriGaleris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ (isset($galeri) && $galeri->kategori_galeri_id == $kategori->id) || old('kategori_galeri_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @empty
                    <option value="" disabled>Tidak ada kategori tersedia</option>
                @endforelse
            </select>
            @error('kategori_galeri_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Field Gambar Utama Galeri --}}
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama Galeri</label>
            @if(isset($galeri) && $galeri->gambar)
                <div class="mb-2">
                    <p class="text-xs text-gray-500 mb-1">Gambar saat ini:</p>
                    <img src="{{ asset('storage/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-32 h-32 object-cover rounded shadow">
                </div>
            @endif
            <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" {{ !isset($galeri) ? 'required' : '' }}>
            @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            @if(isset($galeri))
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar utama.</p>
            @else
                <p class="text-xs text-red-500 mt-1">Gambar harus diisi saat membuat galeri baru.</p>
            @endif
        </div>

        {{-- Field Keterangan dengan Editor TinyMCE --}}
        <div class="mb-6">
            <label for="keterangan_editor" class="block text-sm font-medium text-gray-700 mb-1">Keterangan / Isi Galeri</label>
            <textarea name="keterangan" id="keterangan_editor" class="w-full">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
            @error('keterangan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('tambahgaleri.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ isset($galeri) ? 'Update Galeri' : 'Simpan Galeri' }}
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            console.error('CSRF token not found. Image uploads may fail CSRF protection.');
        }

        tinymce.init({
            selector: 'textarea#keterangan_editor', // Pastikan ID ini cocok dengan textarea di atas
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline strikethrough | ' +
                     'alignleft aligncenter alignright alignjustify | ' +
                     'bullist numlist outdent indent | link image media codesample | ' +
                     'table | ' +
                     'forecolor backcolor emoticons | removeformat | fullscreen preview | help',
            menubar: 'file edit view insert format tools table help',
            height: 500,
            image_advtab: true,
            image_caption: true,
            image_title: true,
            automatic_uploads: true,
            // URL untuk upload gambar via TinyMCE
            images_upload_url: '{{ route("tambahgaleri.tinymce.upload") }}', // Gunakan nama rute yang benar            images_upload_credentials: true, // Penting untuk mengirim CSRF token

            // Handler kustom untuk upload gambar
            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    var xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false; // Set ke true jika Anda memerlukan cookie/sesi di server
                    xhr.open('POST', '{{ route("tambahgaleri.tinymce.upload") }}');

                    // Set header CSRF token
                    if (csrfToken) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    } else {
                        console.error('CSRF token not found. Aborting TinyMCE image upload.');
                        reject({ message: 'CSRF token not found.', remove: true });
                        return;
                    }
                    xhr.setRequestHeader('Accept', 'application/json'); // Server diharapkan mengembalikan JSON

                    xhr.upload.onprogress = function (e) {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function() {
                        var json;

                        if (xhr.status === 403) {
                            reject({ message: 'HTTP Error: ' + xhr.status + '. Permission denied.', remove: true });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject({ message: 'HTTP Error: ' + xhr.status + ' - ' + xhr.statusText + '. Response: ' + xhr.responseText, remove: true });
                            return;
                        }

                        try {
                            json = JSON.parse(xhr.responseText);
                        } catch (e) {
                            reject({ message: 'Invalid JSON response from server: ' + xhr.responseText, remove: true });
                            return;
                        }

                        // Pastikan response JSON memiliki properti 'location' yang berisi URL gambar
                        if (!json || typeof json.location !== 'string' || json.location.trim() === '') {
                            reject({ message: 'Invalid JSON response from server (Missing or empty "location" property). Response: ' + xhr.responseText, remove: true });
                            return;
                        }

                        resolve(json.location); // Mengembalikan URL gambar yang disimpan
                    };

                    xhr.onerror = function () {
                        reject({ message: 'Image upload failed due to a network error.', remove: true });
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename()); // 'file' adalah nama field di server

                    xhr.send(formData);
                });
            },

            // Konfigurasi file picker (untuk tombol "Browse" di TinyMCE)
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        
                        // Periksa jika blobCache tidak tersedia (misalnya editor belum fully initialized)
                        if (!blobCache) {
                            console.error('TinyMCE blobCache is not available. Cannot process file picker selection.');
                            return;
                        }

                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // Panggil callback dengan URL blob agar gambar muncul di editor
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
            setup: function (editor) {
                // Logika tambahan jika diperlukan saat editor diinisialisasi
                editor.on('init', function (e) {
                    console.log('TinyMCE editor initialized.');
                });
                editor.on('change', function () {
                    // Ini penting agar nilai textarea diupdate saat ada perubahan di editor TinyMCE
                    tinymce.triggerSave();
                });
            }
        });
    });
</script>
@endpush
