@extends('layouts.app')

@section('title', 'Menjelajahi Keindahan Alam Yogyakarta')

@section('content')
    {{-- Page Banner --}}
    <div class="relative bg-cover bg-center h-72 md:h-96 lozad page-banner"
         data-background-image="{{ asset('images/merapi3.jpg') }}" {{-- GANTI DENGAN GAMBAR BANNER ALAM ANDA --}}
         style="background-image: url('{{ asset('images/merapi3.jpg') }}');"> {{-- GANTI DENGAN GAMBAR BANNER ALAM ANDA --}}
        {{-- Overlay lebih gelap untuk kontras teks yang lebih baik, mirip contoh --}}
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto px-4 h-full flex flex-col items-center justify-center text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white relative z-10 leading-tight max-w-3xl">
                Menjelajahi Keindahan Alam Yogyakarta yang Mempesona
            </h1>
            {{-- Metadata seperti penulis, tanggal, viewers bisa ditambahkan di sini jika ini adalah halaman artikel --}}
            {{-- <div class="mt-4 text-sm text-gray-200 relative z-10 flex items-center justify-center space-x-4">
                <span><i class="fas fa-user mr-1"></i> Nama Penulis</span>
                <span><i class="fas fa-calendar-alt mr-1"></i> 03 Jun 2025</span>
                <span><i class="fas fa-eye mr-1"></i> 1234 viewers</span>
            </div> --}}
        </div>
    </div>

    {{-- Breadcrumbs and Main Content --}}
    <div class="container mx-auto px-4 py-8 md:py-12">
        <nav aria-label="Breadcrumb" class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:text-blue-600 hover:underline">Home</a></li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </li>
                {{-- Ganti '/galeri-kategori' dengan URL halaman daftar kategori galeri Anda jika ada --}}
                <li><a href="{{ url('/galeri-kategori') }}" class="hover:text-blue-600 hover:underline">Galeri</a></li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </li>
                <li class="font-medium text-gray-700" aria-current="page">Alam</li>
            </ol>
        </nav>

        {{-- Main Content for Alam Category Page --}}
        {{-- Menggunakan kelas 'prose' dari Tailwind Typography untuk styling teks default yang baik --}}
        <article class="prose lg:prose-xl max-w-none text-gray-700">
            <p class="lead">
                Yogyakarta, sebuah permata di Pulau Jawa, tidak hanya kaya akan warisan budaya dan sejarahnya yang mendalam, tetapi juga dianugerahi dengan keindahan alam yang beragam dan memukau. Dari puncak gunung berapi yang megah hingga garis pantai selatan yang eksotis, setiap sudutnya menawarkan pesona tersendiri yang menunggu untuk dijelajahi.
            </p>
            <p>
                Kawasan utara Yogyakarta didominasi oleh kegagahan Gunung Merapi, salah satu gunung berapi paling aktif di Indonesia. Lerengnya menawarkan jalur pendakian yang menantang, pemandangan matahari terbit yang spektakuler, serta museum dan sisa-sisa erupsi yang menjadi saksi bisu kedahsyatannya sekaligus menjadi daya tarik edukasi. Udara sejuk Kaliurang di kaki Merapi juga menjadi tempat peristirahatan favorit.
            </p>
            <p>
                Bergerak ke selatan, Anda akan disambut oleh deretan pantai yang memesona. Pantai Parangtritis dengan legenda Nyi Roro Kidul dan gumuk pasirnya yang unik, Pantai Indrayanti dengan pasir putih dan fasilitas modern, hingga pantai-pantai tersembunyi di Gunungkidul seperti Pantai Timang dengan gondola ekstremnya, semuanya menawarkan pengalaman bahari yang tak terlupakan.
            </p>
            <p>
                Tidak hanya gunung dan pantai, Yogyakarta juga menyimpan keindahan perbukitan seperti di kawasan Dlingo dan Mangunan, di mana hutan pinus yang rindang, kebun buah, dan spot-spot foto Instagramable menjadi primadona. Air terjun tersembunyi, goa-goa alam yang misterius seperti Goa Pindul, serta hamparan sawah hijau yang menyejukkan mata melengkapi kekayaan alam provinsi istimewa ini.
            </p>
            <p>
                Menjelajahi alam Yogyakarta berarti menyelami ketenangan, mengagumi keagungan ciptaan, dan menemukan petualangan di setiap langkah. Ini adalah destinasi yang sempurna bagi mereka yang mencari pelarian dari rutinitas dan ingin menyatu dengan keindahan alam Indonesia.
            </p>

            {{-- Di sini Anda bisa menambahkan galeri foto-foto spesifik tentang kategori Alam jika diinginkan --}}
            {{-- Contoh:
            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Foto-foto Alam Yogyakarta</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/alam_foto_1.jpg') }}" alt="Contoh Foto Alam 1" class="w-full h-56 object-cover">
                    </div>
                    <div class="rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/alam_foto_2.jpg') }}" alt="Contoh Foto Alam 2" class="w-full h-56 object-cover">
                    </div>
                    <div class="rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/alam_foto_3.jpg') }}" alt="Contoh Foto Alam 3" class="w-full h-56 object-cover">
                    </div>
                </div>
            </div>
            --}}
        </article>
    </div>
@endsection

@push('scripts')
{{-- Pastikan Lozad.js sudah di-load secara global di layouts.app.blade.php atau uncomment di bawah jika perlu --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi Lozad untuk elemen dengan kelas 'lozad'
        // Script ini mungkin sudah ada di layouts/app.blade.php Anda.
        // Jika belum, dan Anda menggunakan kelas 'lozad' di atas, Anda perlu inisialisasi di sini atau di app.blade.php
        const observer = lozad('.lozad', {
            loaded: function(el) {
                el.classList.add('loaded');
                // Logika spesifik untuk 'page-banner' jika `data-background-image` digunakan
                if(el.classList.contains('page-banner')) {
                    const bgImage = el.getAttribute('data-background-image');
                    if (bgImage && el.style.backgroundImage === '') { // Hanya set jika belum ada (atau untuk mengganti placeholder)
                        el.style.backgroundImage = `url('${bgImage}')`;
                    }
                }
            }
        });
        observer.observe();
    });
</script>
@endpush