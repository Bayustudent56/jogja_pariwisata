@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-700 to-black text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-sm mb-2 text-gray-300">Home > Kuliner > Berat</p>
        <h1 class="text-4xl font-bold">MAKANAN BERAT</h1>
        <p class="mt-4 text-lg italic text-gray-200">
            Hidangan berat khas Jogja yang mengenyangkan dan kaya rasa.
        </p>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6">
        <!-- Tambahkan artikel seperti di halaman utama -->
        <div class="relative">
            <img src="{{ asset('images/bakmiMO.jpg') }}" alt="Bakmi" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Bakmi Mbah Mo: Cita Rasa Otentik dari Dapur Arang</h2>
                <p class="text-sm mt-1">12 Mei 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/gudegyudjum.jpg') }}" alt="Gudeg" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Gudeg Yu Djum, Rasa Klasik Dekat Keraton Jogja</h2>
                <p class="text-sm mt-1">12 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/sateklatak.jpg') }}" alt="Sate" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Sate Klathak Pak Pong: Legendaris Sejak Zaman Dahulu</h2>
                <p class="text-sm mt-1">12 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/mbokberek.jpg') }}" alt="AyamGoreng" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Ayam Goreng Mbok Berek: Gurih Legendaris Sejak 1950-an</h2>
                <p class="text-sm mt-1">12 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/mangutlele.png') }}" alt="MangutLele" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Petualangan Rasa di Dapur Mbah Marto yang Otentik</h2>
                <p class="text-sm mt-1">12 Januari 2025</p>
            </div>
        </div>
        <div class="relative">
            <img src="{{ asset('images/osengmercon.jpeg') }}" alt="OsengMercon" class="w-full h-60 object-cover rounded">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-1 text-white w-full">
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">BERAT</span>
                <h2 class="text-lg font-bold mt-2">Oseng Mercon Bu Narti, Panasnya Jogja dalam Seporsi Daging</h2>
                <p class="text-sm mt-1">12 Januari 2025</p>
            </div>
        </div>
    </div>
</section>
@endsection
