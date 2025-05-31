@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Destinasi > Sleman</p>
        <h1 class="text-4xl font-bold">DESTINASI WISATA SLEMAN</h1>
        <p class="mt-4 text-lg italic text-gray-200">
        Destinasi yang memadukan alam pegunungan, wisata edukatif, dan kekayaan budaya. Dari Merapi hingga Candi Prambanan, Sleman selalu memesona.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <div class="relative">
            <img src="{{ asset('images/prambanan.jpeg') }}" alt="CandiPrambanan" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">Candi Prambanan – Kompleks Candi Hindu Terbesar di Indonesia.</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/sambisari.jpg') }}" alt="WadukSermo" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">Candi Sambisari – Candi Bawah Tanah yang ditemukan Terkubur</h2>
                <p class="text-sm mt-1">10 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/lostworldcastle.jpeg') }}" alt="TheLostWorlCastle" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">The Lost World Castle – Kastil Wisata dengan Latar Gunung Merapi</h2>
                <p class="text-sm mt-1">15 Maret 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/tlogoputri.jpeg') }}" alt="TlogoPutri" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">Tlogo Putri Kaliurang – Tempat Wisata Alam dan Outbound</h2>
                <p class="text-sm mt-1">7 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/bhumimerapi.jpg') }}" alt="ArgowisataBhumiMerapi" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">Agrowisata Bhumi Merapi – Wisata Edukasi Pertanian dan Peternakan</h2>
                <p class="text-sm mt-1">5 Desember 2024</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/stonehenge.jpg') }}" alt="Stonehenge" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded"> SLEMAN</span>
                <h2 class="text-lg font-bold mt-2">Stonehenge Merapi – Replika Stonehenge Versi Sleman</h2>
                <p class="text-sm mt-1">7 November 2024</p>
            </div>
        </div>
    </div>
</section>
@endsection
