@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Destinasi > Bantul</p>
        <h1 class="text-4xl font-bold">DESTINASI WISATA BANTUL</h1>
        <p class="mt-4 text-lg italic text-gray-200">
        Kental dengan tradisi dan sentuhan alam yang asri. Dari desa wisata hingga pantai selatan, Bantul menyuguhkan pesona yang bersahaja namun memikat.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/tritis.jpg') }}" alt="ParangTritis" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Pantai Parangtritis – Pantai Ikonik dengan Sunset Indah dan Mitos Nyi Roro Kidul.</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/pinusmangun.jpg') }}" alt="HutanPinusaMangunan" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Hutan Pinus Mangunan – Hutan Pinus yang Cocok untuk Foto dan Piknik</h2>
                <p class="text-sm mt-1">10 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/gumukpasir.jpg') }}" alt="GumukPasirParangkusumo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Gumuk Pasir Parangkusumo – Padang Pasir Unik untuk Sandboarding</h2>
                <p class="text-sm mt-1">15 Maret 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/becici.jpeg') }}" alt="PuncakBecici" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Puncak Becici – Spot Sunset dan Sunrise dengan Gardu Pandang</h2>
                <p class="text-sm mt-1">7 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/kebunmangun.jpg') }}" alt="KebunBuahMangunan" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Kebun Buah Mangunan – dikenal sebagai "Negeri di Atas Awan"</h2>
                <p class="text-sm mt-1">5 Desember 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/kediwung.jpg') }}" alt="PuncakPangukKediwung" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BANTUL</span>
                <h2 class="text-lg font-bold mt-2">Puncak Panguk Kediwung – spot foto instagramable dengan view lembah</h2>
                <p class="text-sm mt-1">7 November 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
