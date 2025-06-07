<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pariwisata Jogja</title>

    {{-- PASTIKAN INI ADALAH CDN ALPINE.JS VERSI 3.x.x --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- CSS Kustom untuk tinggi menu mobile --}}
    <style>
        .h-screen-minus-navbar {
            /* Asumsi tinggi navbar 64px (py-4 dengan default padding) */
            height: calc(100vh - 64px);
            /* Jika navbar Anda tinggi 56px (h-14), ganti jadi calc(100vh - 56px) */
        }
        /* Style untuk transisi overlay (jika Alpine 3 belum berfungsi penuh untuk overlay) */
        .overlay-transition {
            transition: opacity 0.3s ease-out;
        }
        .overlay-hidden {
            opacity: 0;
        }
        .overlay-visible {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-100 font-poppins">

    <div x-data="{ mobileMenuOpen: false }">

        {{-- ==================== NAVBAR BARU YANG RESPONSIF ==================== --}}
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">

                    <div>
                        <a href="/" class="flex items-center text-xl font-semibold text-gray-800">
                            {{-- CATATAN: 'asset()' adalah helper Laravel. Jika ini hanya HTML biasa, ganti jadi 'images/logo.jpg' atau path relatif lainnya. --}}
                            <img src="{{ asset('images/logo1.jpg') }}" alt="XploreJogja Logo" class="h-12 w-12 rounded-full object-cover">
                            <span class="ml-2">XploreJogja</span>
                        </a>
                    </div>

                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="/" class="text-lg text-gray-700 hover:text-blue-600">Beranda</a>

                        {{-- Galeri sekarang menjadi link biasa, dropdown dihilangkan --}}
                        <a href="#" class="text-lg text-gray-700 hover:text-blue-600">Galeri</a>

                        <a href="/artikel" class="text-lg text-gray-700 hover:text-blue-600">Artikel</a> {{-- Destinasi -> Artikel --}}
                        {{-- Kuliner telah dihapus --}}
                    </div>

                    <div class="flex items-center">
                        <div class="hidden lg:block">
                            <input type="text" class="p-2 w-48 rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                        </div>

                        <div class="lg:hidden ml-4">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Overlay untuk Mobile Menu (Fade In/Out) --}}
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="mobileMenuOpen = false"
                 class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

            {{-- Mobile Menu (yang akan dianimasikan turun dari atas) --}}
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
                <a href="/" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Beranda</a>
                <a href="#" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Galeri</a>
                <a href="/artikel" @click="mobileMenuOpen = false" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors duration-200">Artikel</a> {{-- Destinasi -> Artikel --}}
                {{-- Kuliner telah dihapus --}}
            </div>
        </nav>
        {{-- ==================== AKHIR NAVBAR ==================== --}}

        <main>
            @yield('content')
        </main>

    </div>

</body>
</html>