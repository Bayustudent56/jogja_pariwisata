@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Destinasi > Yogyakarta</p>
        <h1 class="text-4xl font-bold">DESTINASI WISATA YOGYAKARTA</h1>
        <p class="mt-4 text-lg italic text-gray-200">
        Pusat budaya dan sejarah Jawa yang tak pernah tidur. Jelajahi warisan Kraton, Malioboro, hingga ragam kuliner legendaris di jantung Jogja.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/keraton.jpeg') }}" alt="KeratonYogyakarta" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Keraton Yogyakarta – Pusat Budaya dan Sejarah Kesultanan Yogyakarta</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/tamsar.jpeg') }}" alt="TamanSari" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Taman Sari – Bekas Taman dan Pemandian Kerajaan yang Eksotis</h2>
                <p class="text-sm mt-1">10 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/malbor.jpg') }}" alt="Malioboro" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Malioboro – Pusat Belanja, Oleh-Oleh, dan Kuliner Khas Jogja</h2>
                <p class="text-sm mt-1">15 Maret 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/benteng.jpg') }}" alt="BentengVredeburg" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Benteng Vredeburg – Museum Sejarah Peninggalan Belanda</h2>
                <p class="text-sm mt-1">7 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/alkid.jpg') }}" alt="AlunAlunKidul" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Alun-Alun Kidul – Tempat Bermain dan Ritual "masangin"</h2>
                <p class="text-sm mt-1">5 Desember 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/sonobudoyo.jpg') }}" alt="MuseumSonobudoyo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">YOGYAKARTA</span>
                <h2 class="text-lg font-bold mt-2">Museum Sonobudoyo – Koleksi Budaya Jawa dan Arkeologi</h2>
                <p class="text-sm mt-1">7 November 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
