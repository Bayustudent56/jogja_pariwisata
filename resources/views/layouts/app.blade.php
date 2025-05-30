<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pariwisata Jogja</title>
    {{-- Kita tetap gunakan dependensi yang Anda pilih --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

{{-- Ganti bg-gray-100 dengan bg-amber-50 atau warna krem lain jika ingin sesuai desain Figma --}}
<body class="bg-gray-100 font-poppins">

    {{-- x-data mendefinisikan state untuk komponen ini (apakah menu mobile terbuka atau tidak) --}}
    <div x-data="{ mobileMenuOpen: false }">
        
        {{-- ==================== NAVBAR BARU YANG RESPONSIF ==================== --}}
        {{-- Navbar ini akan menempel di atas dan menjadi satu-satunya sumber navigasi --}}
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    
                    <div>
                        <a href="/" class="text-xl font-semibold text-gray-800">Web Pariwisata Jogja</a>
                    </div>

                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="/" class="text-lg text-gray-700 hover:text-blue-600">Beranda</a>
                        
                        {{-- Dropdown Berita dengan Alpine.js --}}
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center text-lg text-gray-700 hover:text-blue-600">
                                <span>Berita</span>
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <ul x-show="open" @click.away="open = false" class="absolute left-0 w-40 mt-2 bg-white shadow-lg rounded-md z-50">
                                <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Terkini</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Destinasi</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Kuliner</a></li>
                            </ul>
                        </div>
                        
                        <a href="/destinasi" class="text-lg text-gray-700 hover:text-blue-600">Destinasi</a>
                        <a href="/kuliner" class="text-lg text-gray-700 hover:text-blue-600">Kuliner</a>
                    </div>

                    <div class="flex items-center">
                        {{-- Kolom Search hanya untuk layar besar --}}
                        <div class="hidden lg:block">
                            <input type="text" class="p-2 w-48 rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                        </div>
                        
                        {{-- Tombol Hamburger hanya untuk layar kecil (lg:hidden) --}}
                        <div class="lg:hidden ml-4">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    {{-- Ikon berubah tergantung state 'mobileMenuOpen' --}}
                                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="mobileMenuOpen" class="lg:hidden">
                <a href="/" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100">Beranda</a>
                <a href="#" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100">Berita</a>
                <a href="/destinasi" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100">Destinasi</a>
                <a href="/kuliner" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100">Kuliner</a>
                <div class="px-4 py-3">
                    <input type="text" placeholder="Search..." class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                </div>
            </div>
        </nav>
        {{-- ==================== AKHIR NAVBAR ==================== --}}

        <main>
            {{-- Konten dari beranda.blade.php atau halaman lain akan masuk ke sini --}}
            @yield('content')
        </main>

    </div>

</body>
</html>