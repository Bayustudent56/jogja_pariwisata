@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Kuliner > Ringan</p>
        <h1 class="text-4xl font-bold">MAKANAN RINGAN</h1>
        <p class="mt-4 text-lg italic text-gray-200">
            Camilan dan jajanan khas Jogja yang menggugah selera.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/geplak.jpg') }}" alt="geplak" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Geplak Rrumahan, dibuat dengan Tangan dan Cinta Warisan Manis dari Selatan Jogja</h2>
                <p class="text-sm mt-1">6 April 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/kipo.jpeg') }}" alt="kipo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Kipo Langka dari Kotagede, Kalau Nemu Jangan Cuma dibeli Satu</h2>
                <p class="text-sm mt-1">14 Februari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/yangko.jpg') }}" alt="Yangko" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Yangko Klasik yang Cuma bisa Kamu Rasakan Langsung dari Sumbernya</h2>
                <p class="text-sm mt-1">3 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/coklat.jpg') }}" alt="Yangko" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Bukan Sekadar Oleh-Oleh, Pabrik Cokelat Asli Jogja yang Menyaingi Rasa Belgia</h2>
                <p class="text-sm mt-1">15 Mei 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/bakpia.jpg') }}" alt="bakpia" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Bukan Bakpia Biasa! Kurnia Sari Rahasia Warga Lokal yang Lembut dan Kaya Rasa</h2>
                <p class="text-sm mt-1">15 April 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/lupis.jpeg') }}" alt="lupis" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">RINGAN</span>
                <h2 class="text-lg font-bold mt-2">Kalau Datang Pagi, Bisa Sarapan Legenda Kuliner Jogja yang Tampil di Netflix</h2>
                <p class="text-sm mt-1">17 Januari 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
