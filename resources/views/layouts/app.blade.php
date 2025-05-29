<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pariwisata Jogja</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-poppins">

    <!-- Sidebar -->
    <div x-data="{ open: false }" class="flex">
        <!-- Sidebar content -->
        <div>
            <button @click="open = !open" class="p-4 text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Sidebar dropdown menu -->
            <div x-show="open" @click.away="open = false" class="fixed left-0 top-0 w-64 bg-white shadow-md h-full flex flex-col items-center p-4 z-50">
                <a href="#" class="text-lg text-gray-800 py-4">→ Login</a>
                <a href="#" class="text-lg text-gray-800 py-4">⚙ Setting</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-6">

            <!-- Navbar -->
            <div class="flex justify-between items-center mb-6">
                <!-- Left Section: Logo and Menu -->
                <div class="flex space-x-4">
                    <button class="lg:hidden text-3xl text-gray-800" @click="open = !open">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <a href="/" class="text-xl font-semibold text-gray-800">Web Pariwisata Jogja</a>
                </div>

                <!-- Right Section: Navbar Links & Search -->
                <div class="flex space-x-8 items-center">
                    <a href="/" class="text-lg text-gray-700 hover:text-blue-600">Beranda</a>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-lg text-gray-700 hover:text-blue-600">Berita</button>
                        <ul x-show="open" @click.away="open = false" class="absolute left-0 w-32 mt-2 bg-white shadow-lg rounded-md">
                            <li><a href="/berita/terkini" class="block px-4 py-2 text-gray-700">Terkini</a></li>
                            <li><a href="/berita/destinasi" class="block px-4 py-2 text-gray-700">Destinasi</a></li>
                            <li><a href="/berita/kuliner" class="block px-4 py-2 text-gray-700">Kuliner</a></li>
                        </ul>
                    </div>
                    <a href="/destinasi" class="text-lg text-gray-700 hover:text-blue-600">Destinasi</a>
                    <a href="/kuliner" class="text-lg text-gray-700 hover:text-blue-600">Kuliner</a>

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

            <!-- Dynamic Content Area -->
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
