@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Destinasi > Yogyakarta</p>
        <h1 class="text-4xl font-bold">DESTINASI WISATA GUNUNGKIDUL</h1>
        <p class="mt-4 text-lg italic text-gray-200">
        Surga tersembunyi di selatan Jogja. Nikmati pantai eksotis, goa-goa menakjubkan, dan cita rasa khas dari tanah karst.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/indrayanti.jpeg') }}" alt="PantaiIndrayanti" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Pantai Indrayanti – Pantai Bersih dan Ramai dengan Fasilitas Lengkap</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/timang.jpeg') }}" alt="PantaiTimang" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Pantai Timang – Terkenal dengan Gondola Manual ke Batu Karang</h2>
                <p class="text-sm mt-1">10 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/pindul.jpg') }}" alt="GoaPindul" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Goa Pindul – Cave Tubing Menyusuri Sungai dalam Goa</h2>
                <p class="text-sm mt-1">15 Maret 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/srigethuk.jpeg') }}" alt="AirTerjunSriGethuk" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Air Terjun Sri Gethuk – Air Terjun Cantik di Tengah Sawah</h2>
                <p class="text-sm mt-1">7 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/bintuk.jpeg') }}" alt="BukitBintangPatuk" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Bukit Bintang Patuk – Tempat Nongkrong dengan View Citylight Jogja</h2>
                <p class="text-sm mt-1">5 Desember 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/jomblang.jpg') }}" alt="GoaJomblang" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">GUNUNGKIDUL</span>
                <h2 class="text-lg font-bold mt-2">Goa Jomblang – Goa Vertikal dengan "Cahaya Surga".</h2>
                <p class="text-sm mt-1">7 November 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
