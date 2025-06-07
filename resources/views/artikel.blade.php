@extends('layouts.app')

@section('title', 'Artikel Kami (Kategori Artikel)')

@push('styles')
<style>
    /* Gaya spesifik untuk banner utama di halaman ini */
    .main-page-banner {
        position: relative;
        width: 100%;
        height: 400px;
        background-size: cover;
        background-position: center center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        overflow: hidden;
        background-color: black !important;
    }
    .main-page-banner .overlay-darker-custom {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.70) !important;
        z-index: 1;
    }
    .main-page-banner h1 {
        font-size: 2.5rem;
        font-weight: bold;
        line-height: 1.2;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
        margin-bottom: 0 !important;
    }


    /* Styling untuk kartu kategori (sama seperti galeri.blade.php) */
    .category-card {
        background-color: #fff;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .category-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }
    .category-card:hover img {
        transform: scale(1.05);
    }

    /* Efek hover pada gambar kategori */
    .category-card .overlay-on-hover {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0); /* Awalnya transparan penuh */
        transition: background-color 0.3s ease-in-out; /* Transisi untuk perubahan warna */
        z-index: 2; /* Pastikan di atas gambar tapi di bawah teks judul */
    }
    .category-card:hover .overlay-on-hover {
        background-color: rgba(0, 0, 0, 0.40); /* Menghitam 40% saat hover */
    }
    /* Pastikan teks judul dan deskripsi kategori di atas overlay ini */
    .category-card .absolute.bottom-0.left-0.p-5 {
        z-index: 3; /* Pastikan teks di atas overlay */
    }

</style>
@endpush

@section('content')
    {{-- Page Banner --}}
    <div class="main-page-banner lozad page-banner"
         data-background-image="{{ asset('images/artikel-banner.jpg') }}"> {{-- Gambar banner utama artikel --}}
        <div class="overlay-darker-custom"></div>
        <div class="container mx-auto px-4 h-full flex items-center justify-center text-center relative z-20">
            <h1 class="text-3xl md:text-5xl font-bold text-white relative z-10 leading-tight text-shadow-strong">
                Jelajahi Artikel Terbaik Kami
            </h1>
        </div>
    </div>

    {{-- Breadcrumbs and Category Grid --}}
    <div class="container mx-auto px-4 mt-10 mb-6">
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:text-blue-600 hover:underline">Beranda</a></li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </li>
                {{-- Tambahkan tautan "Artikel" di sini --}}
                <li><a href="{{ route('artikel.public') }}" class="hover:text-blue-600 hover:underline">Artikel</a></li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </li>
                {{-- Jadikan "Kategori Artikel" sebagai halaman aktif --}}
            </ol>
        </nav>

        <h2 class="text-3xl font-bold text-gray-800 mt-8 mb-6 text-center">Kategori Artikel</h2>

        @if($kategoriArtikels->isEmpty())
            <p class="text-center text-gray-600 text-lg">Belum ada kategori artikel yang tersedia.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-8">
                @foreach($kategoriArtikels as $kategori)
                @if($kategori->slug)
                <a href="{{ route('artikel.by.category.public', ['slug' => $kategori->slug]) }}"
                   class="group block rounded-xl overflow-hidden shadow-lg hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 ease-in-out category-card">
                    <div class="relative">
                        <img data-src="{{ asset($kategori->gambar ?? 'images/kategori-artikel-images/kategori-artikel-placeholder.jpg') }}"
                             src="{{ asset($kategori->gambar ?? 'images/kategori-artikel-images/kategori-artikel-placeholder.jpg') }}"
                             alt="{{ $kategori->nama_kategori }}"
                             class="lozad w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="overlay-on-hover"></div>
                        <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <h5 class="text-xl font-semibold text-white transition-colors duration-300 group-hover:text-gray-300">
                                {{ $kategori->nama_kategori }}
                            </h5>
                        </div>
                    </div>
                </a>
                @else
                <div class="category-card block">
                    <div class="relative p-5 text-center text-red-500">
                        Error: Kategori "{{ $kategori->nama_kategori }}" tidak memiliki slug.
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        @endif
    </div>

@endsection

@push('scripts')
{{-- Lozad.js dan Alpine.js sudah dimuat di layouts/app.blade.php --}}
@endpush
