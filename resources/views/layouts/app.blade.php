<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'XploreJogja')</title>

    {{-- Tailwind CSS CDN --}}
    {{-- Penting: Untuk produksi, sangat disarankan menggunakan Tailwind CLI atau Vite/Mix untuk performa dan ukuran file yang lebih kecil. --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    {{-- Google Fonts: Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- CSS Kustom Penuh untuk Halaman Publik --}}
    <style>
        /* Mengatur font Poppins sebagai default untuk seluruh body */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Styling untuk Header dengan Gambar Latar Belakang Penuh dan Overlay */
        .header-dominant {
            position: relative;
            width: 100%;
            height: 400px; /* Tinggi header sesuai gambar */
            background-size: cover;
            background-position: center center;
            display: flex;
            align-items: center; /* Konten di tengah vertikal */
            text-align: left; /* Teks di header rata kiri */
            color: white; /* Warna teks putih untuk header */
            overflow: hidden;
        }
        .header-dominant .overlay-dark {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.70) !important; /* Overlay hitam lebih gelap */
            z-index: 1;
        }
        .header-dominant .content-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px; /* Lebar maksimal content-wrapper di header */
            margin-left: 2rem; /* Jarak dari kiri seperti gambar */
            margin-right: auto;
            padding-left: 1rem; /* Padding internal */
            padding-right: 1rem;
        }
        @media (min-width: 768px) { /* md breakpoint */
            .header-dominant .content-wrapper {
                margin-left: 4rem; /* Sesuaikan margin-left untuk layar lebih besar */
            }
        }
        @media (min-width: 1024px) { /* lg breakpoint */
            .header-dominant .content-wrapper {
                margin-left: 6rem; /* Sesuaikan margin-left untuk layar desktop */
            }
        }
        .header-dominant h1 {
            font-size: 2.5rem; /* text-4xl */
            font-weight: bold;
            line-height: 1.2;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
            margin-bottom: 0.5rem;
        }
        .header-dominant .meta-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem; /* Jarak antar item meta */
            font-size: 0.875rem;
            color: #e5e7eb; /* text-gray-200 */
        }
        .header-dominant .meta-info span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        .header-dominant .meta-info svg {
            width: 1rem;
            height: 1rem;
        }

        /* Styling untuk Konten Utama (Benar-benar Full Width) */
        .main-content-area {
            background-color: #ffffff; /* Latar belakang putih untuk konten */
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
            width: 100%; /* Lebar penuh */
            /* Padding horizontal untuk seluruh area konten, agar tidak menempel tepi layar */
            padding-left: 1rem;
            padding-right: 1rem;
            line-height: 1.625;
            color: #374151; /* text-gray-800 */
            text-align: justify;
        }
        @media (min-width: 640px) { /* sm breakpoint */
            .main-content-area {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
        @media (min-width: 1024px) { /* lg breakpoint */
            .main-content-area {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        /* Styling default untuk elemen HTML yang dihasilkan TinyMCE */
        .main-content-area .prose {
            max-width: none;
            margin-left: 0;
            margin-right: 0;
            padding: 0;
        }
        .main-content-area .prose img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .main-content-area .prose p {
            margin-bottom: 1rem;
            line-height: 1.75;
            font-size: 1.125rem;
        }
        .main-content-area .prose h1, .main-content-area .prose h2, .main-content-area .prose h3, .main-content-area .prose h4, .main-content-area .prose h5, .main-content-area .prose h6 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
            line-height: 1.3;
        }
    </style>
    @stack('styles') {{-- Ini tetap ada untuk style spesifik halaman --}}
</head>

{{-- MODIFIKASI BODY UNTUK STICKY FOOTER --}}
<body class="bg-gray-100 flex flex-col min-h-screen"> {{-- font-poppins sudah diatur di style global --}}

    {{-- x-data="mobileMenuOpen: false" diletakkan di sini untuk mencakup seluruh komponen yang menggunakan mobileMenuOpen --}}
    <div x-data="{ mobileMenuOpen: false }" class="flex-grow flex flex-col"> {{-- Wrapper untuk konten agar mengisi sisa ruang --}}

        {{-- ==================== NAVBAR ==================== --}}
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">

                    <div>
                        <a href="{{ route('beranda') }}" class="flex items-center text-xl font-semibold text-gray-800">
                            {{-- Pastikan path gambar logo ini benar --}}
                            <img src="{{ asset('images/logo1.jpg') }}" alt="XploreJogja Logo" class="h-12 w-12 rounded-full object-cover">
                            <span class="ml-2">XploreJogja</span>
                        </a>
                    </div>

                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="{{ route('beranda') }}" class="text-lg text-gray-700 hover:text-blue-600">Home</a>
                        <a href="{{ route('galeri.public') }}" class="text-lg text-gray-700 hover:text-blue-600">Galeri</a>
                        <a href="{{ route('artikel.public') }}" class="text-lg text-gray-700 hover:text-blue-600">Artikel</a>
                    </div>

                    <div class="flex items-center">
                        <div class="hidden lg:block">
                            <input type="text" class="p-2 w-48 rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                        </div>

                        <div class="lg:hidden ml-4">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    {{-- Menggunakan x-bind:class untuk conditional show/hide icon --}}
                                    <path x-bind:class="{ 'hidden': mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path x-bind:class="{ 'hidden': !mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Overlay untuk Mobile Menu --}}
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="mobileMenuOpen = false"
                 class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="-translate-y-full"
                 x-transition:enter-end="translate-y-0"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="translate-y-0"
                 x-transition:leave-end="-translate-y-full"
                 class="lg:hidden fixed top-0 left-0 w-full bg-white shadow-lg p-4 z-40">

                {{-- Tombol Close (X) di dalam menu, menempel di kanan atas --}}
                <div class="flex justify-end mb-4">
                    <button @click="mobileMenuOpen = false" class="text-gray-800 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                {{-- Kolom Search untuk layar kecil --}}
                <div class="px-4 py-3 mb-4">
                    <input type="text" placeholder="Search..." class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                {{-- Item Navigasi Mobile --}}
                <a href="{{ route('beranda') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Home</a>
                <a href="{{ route('galeri.public') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Galeri</a>
                <a href="{{ route('artikel.public') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Artikel</a>
            </div>
        </nav>
        {{-- ==================== AKHIR NAVBAR ==================== --}}

        {{-- Konten utama aplikasi --}}
        <main class="flex-grow"> {{-- TAMBAHKAN flex-grow DI SINI --}}
            @yield('content')
        </main>

        {{-- ==================== FOOTER ==================== --}}
        <footer class="bg-gray-800 text-white py-8 mt-auto"> {{-- TAMBAHKAN mt-auto DI SINI --}}
            <div class="container mx-auto px-4 text-center text-sm">
                &copy; {{ date('Y') }} XploreJogja. All rights reserved.
            </div>
        </footer>
        {{-- ==================== AKHIR FOOTER ==================== --}}

    </div>

    {{-- Lozad.js (lazy loading) --}}
    <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    
    {{-- Alpine.js CDN --}}
    {{-- 'defer' memastikan script dimuat setelah HTML di-parse, '3.x.x' akan mendapatkan versi terbaru 3.x --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    
    @stack('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observer = lozad('.lozad', {
                loaded: function(el) {
                    el.classList.add('loaded');
                    if(el.classList.contains('page-banner') && el.dataset.backgroundImage) {
                        el.style.backgroundImage = `url('${el.dataset.backgroundImage}')`;
                    }
                }
            });
            observer.observe();
        });
    </script>

</body>
</html>