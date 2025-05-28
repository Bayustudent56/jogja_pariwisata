<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pariwisata Jogja</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

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
            <div x-show="open" @click.away="open = false" class="fixed left-0 top-0 w-40 bg-white shadow-md h-full flex flex-col items-center p-4 z-50">
                <a href="#" class="text-lg text-gray-800 py-4">→ Login</a>
                <a href="#" class="text-lg text-gray-800 py-4">⚙ Setting</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Navbar -->
            <div class="flex justify-between items-center mb-4">
                <div class="text-xl font-semibold text-gray-800">Beranda</div>
                <div class="flex space-x-6">
                    <!-- Berita Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-gray-800 font-semibold">Berita</button>
                        <div x-show="open" @click.away="open = false" class="absolute left-0 w-40 mt-2 bg-white shadow-lg rounded-lg">
                            <ul class="text-sm text-gray-700">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Terkini</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Destinasi</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Kuliner</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Destinasi Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-gray-800 font-semibold">Destinasi</button>
                        <div x-show="open" @click.away="open = false" class="absolute left-0 w-40 mt-2 bg-white shadow-lg rounded-lg">
                            <ul class="text-sm text-gray-700">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Jogja</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Sleman</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Kulprog</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Bantul</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Kuliner Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-gray-800 font-semibold">Kuliner</button>
                        <div x-show="open" @click.away="open = false" class="absolute left-0 w-40 mt-2 bg-white shadow-lg rounded-lg">
                            <ul class="text-sm text-gray-700">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Jogja</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Sleman</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Kulprog</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Bantul</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative mb-6">
                <img src="https://via.placeholder.com/1200x400?text=Jl.+Malioboro" alt="Malioboro" class="w-full h-64 object-cover rounded-lg shadow-md">
            </div>

            <!-- Highlights Section -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold text-gray-800">Highlight 1</h2>
                    <p class="text-gray-600">Desc</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold text-gray-800">Highlight 2</h2>
                    <p class="text-gray-600">Desc</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold text-gray-800">Highlight 3</h2>
                    <p class="text-gray-600">Desc</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="font-semibold text-gray-800">Highlight 4</h2>
                    <p class="text-gray-600">Desc</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
