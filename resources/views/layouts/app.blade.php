<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pariwisata Jogja</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- External CSS Link -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-poppins">

    <!-- Sidebar (visible on all screen sizes, toggled with hamburger) -->
    <div x-data="{ open: false }" class="flex">
        <!-- Sidebar content -->
        <div x-show="open" @click.away="open = false" class="fixed left-0 top-0 w-64 bg-white shadow-md h-full z-50 lg:block transition-all duration-300">
            <div class="p-4">
                <a href="#" class="text-lg text-gray-800 py-4 block">→ Login</a>
                <a href="#" class="text-lg text-gray-800 py-4 block">⚙ Setting</a>
            </div>
        </div>

        <!-- Main content -->
        <div :class="{'ml-64': open}" class="flex-1 p-6 transition-all duration-300">
            <!-- Navbar (sticky with hamburger and links visible on all screen sizes) -->
            <div class="sticky top-0 z-50 bg-white shadow-md mb-6">
                <div class="flex justify-between items-center p-4">
                    <!-- Left Section: Hamburger Menu (Visible on all screen sizes) -->
                    <div class="flex space-x-4">
                        <!-- Hamburger icon for all screen sizes -->
                        <button @click="open = !open" class="text-3xl text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Right Section: Navbar Links & Search -->
                    <div class="flex space-x-8 items-center">
                        <a href="/" class="text-lg text-gray-700 hover:text-blue-600">Beranda</a>
                        <a href="/berita" class="text-lg text-gray-700 hover:text-blue-600">Berita</a>
                        <a href="/destinasi" class="text-lg text-gray-700 hover:text-blue-600">Destinasi</a>
                        <!-- Dropdown Kuliner -->
                        <div x-data="{ openKuliner: false }" class="relative">
                            <button @click="openKuliner = !openKuliner"
                                class="text-lg text-gray-700 hover:text-blue-600 flex items-center gap-1"
                            >
                                Kuliner
                                <svg class="w-4 h-4 transform" :class="{ 'rotate-180': openKuliner }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
    
                            <div x-show="openKuliner" @click.outside="openKuliner = false"
                                x-transition
                                class="absolute z-50 mt-2 w-40 bg-white shadow-lg rounded-lg py-2"
                            >
                                <a href="{{ url('/kuliner/berat') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    Berat
                                </a>
                                <a href="{{ url('/kuliner/ringan') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    Ringan
                                </a>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="relative">
                            <input type="text" class="p-2 w-48 rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                            <button class="absolute right-0 top-0 p-2 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6M10 18l-6-6m6 6l6-6m-6 6l6 6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Content Area (will display content from individual pages like beranda) -->
            <div class="content-area">
                @yield('content') <!-- Content from specific pages like beranda -->
            </div>
        </div>
    </div>

</body>

</html>
