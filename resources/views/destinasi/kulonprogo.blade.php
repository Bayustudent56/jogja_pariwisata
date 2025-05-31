@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Destinasi > KULON PROGO</p>
        <h1 class="text-4xl font-bold">DESTINASI WISATA KULON PROGO</h1>
        <p class="mt-4 text-lg italic text-gray-200">
        Keindahan alam yang masih alami di sisi barat Jogja. Sungai, pegunungan, dan kearifan lokal berpadu menciptakan pengalaman wisata yang damai dan mengesankan.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/kalibiru.jpg') }}" alt="Kalibiru" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Kalibiru – Wisata Alam dengan Gardu Pandang dan Pemandangan Waduk Sermo</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/sermo.jpeg') }}" alt="WadukSermo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Waduk Sermo – Waduk Tenang untuk Piknik dan Naik Perahu</h2>
                <p class="text-sm mt-1">10 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/kedut.jpeg') }}" alt="AirTerjunKedungPedut" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Air Terjun Kedung Pedut – Air Terjun dengan Dua Warna</h2>
                <p class="text-sm mt-1">15 Maret 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/gununggajah.jpeg') }}" alt="TebingGunungGajah" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Tebing Gunung Gajah – Spot Foto dengan Latar Perbukitan dan Sawah</h2>
                <p class="text-sm mt-1">7 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/busis.jpg') }}" alt="BukitIsis" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Bukit Isis – Pemandangan Hijau dan Udara Sejuk</h2>
                <p class="text-sm mt-1">5 Desember 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/kiskendo.jpg') }}" alt="GoaKiskendo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">KULON PROGO</span>
                <h2 class="text-lg font-bold mt-2">Goa Kiskendo – Goa Bersejarah dengan Stalaktit dan Stalagmit</h2>
                <p class="text-sm mt-1">7 November 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
