<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- <--- PASTIKAN BARIS INI ADA --}}
    <title>Admin - XploreJogja</title>

    {{-- Alpine.js (defer untuk performa) --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Tailwind CSS CDN (digunakan sesuai kode Anda) --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    {{-- Google Fonts: Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    {{-- TinyMCE CDN (API key Anda sudah ada) --}}
    <script src="https://cdn.tiny.cloud/1/a0erlex1eh5n1d07f82uffovakehiykfg4y2ei25935nt974/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- Custom Styles from child views (@push('styles')) --}}
    @stack('styles')
</head>

<body class="bg-gray-100 font-poppins">
    <div x-data="{ mobileMenuOpen: false }">
        {{-- ==================== ADMIN NAVBAR ==================== --}}
        <nav class="bg-gray-800 text-white shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <div>
                        <a href="{{ route('dashboard') }}" class="flex items-center text-xl font-semibold">
                            {{-- Pastikan asset('images/logo1.jpg') ini ada dan benar --}}
                            <img src="{{ asset('images/logo1.jpg') }}" alt="Logo" class="h-10 w-10 rounded-full object-cover">
                            <span class="ml-2">Admin Panel</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('dashboard') }}" class="hover:text-yellow-300">Dashboard</a>
                        {{-- PERBAIKAN DI SINI: artikel.index menjadi tambahartikel.index --}}
                        <a href="{{ route('tambahartikel.index') }}" class="hover:text-yellow-300">Tambah Artikel</a>
                        <a href="{{ route('tambahgaleri.index') }}" class="hover:text-yellow-300">Tambah Galeri</a>
                        <a href="{{ route('logout') }}" class="hover:text-red-400"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                    {{-- Mobile Menu Button --}}
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path x-show="!mobileMenuOpen" d="M4 6h16M4 12h16M4 18h16"/>
                                <path x-show="mobileMenuOpen" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu Content --}}
            <div x-show="mobileMenuOpen"
                 x-transition
                 class="md:hidden bg-gray-800 text-white p-4">
                <a href="{{ route('dashboard') }}" class="block py-2">Dashboard</a>
                {{-- PERBAIKAN DI SINI: artikel.index menjadi tambahartikel.index --}}
                <a href="{{ route('tambahartikel.index') }}" class="block py-2">Tambah Artikel</a>
                <a href="{{ route('tambahgaleri.index') }}" class="block py-2">Tambah Galeri</a>
                <a href="{{ route('logout') }}" class="block py-2 text-red-400"
                   onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                    Logout
                </a>
                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
        {{-- ==================== END NAVBAR ==================== --}}

        <main class="p-6">
            @yield('content')
        </main>
    </div>
    {{-- Custom Scripts from child views (@push('scripts')) --}}
    @stack('scripts')
</body>
</html>
