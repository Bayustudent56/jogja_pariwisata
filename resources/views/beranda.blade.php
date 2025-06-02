@extends('layouts.app')

@section('content')
    {{--
        Untuk warna latar belakang seperti di gambar, tambahkan kelas bg-amber-50 atau bg-orange-50
        atau warna custom Anda ke tag <body> di file layouts/app.blade.php.
        Contoh: <body class="bg-amber-50">
    --}}

    {{-- BAGIAN 1: HERO BANNER (GAMBAR STATIS) --}}
    <div class="w-full relative h-screen overflow-hidden"> 
        
        {{-- Gambar Utama (Tugu Jogja) --}}
        <img src="{{ asset('images/tugujogja.jpg') }}"
             alt="tugu jogja"
             class="w-full h-full object-cover object-center"> 
        
        {{-- Overlay semi-transparan (Opsional, untuk readability teks di atas gambar) --}}
        <div class="absolute inset-0 bg-black opacity-20"></div>

        {{-- Teks di atas gambar --}}
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-left p-8 md:p-16">
            <div class="max-w-4xl w-full"> {{-- Batasi lebar teks untuk tampilan lebih baik --}}
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-normal leading-tight md:leading-snug mb-4">
                    Welcome to <br> <span class="font-semibold">XploreJogja</span>
                </h1>
                <p class="text-xl sm:text-2xl md:text-3xl font-light leading-relaxed">
                    Unforgettable Journey
                </p>
            </div>
        </div>
    </div>

    {{-- BAGIAN BARU: DAFTAR DAERAH DI YOGYAKARTA (Mengganti BAGIAN 2) --}}
    <div class="bg-gray-100 py-16"> {{-- Anda bisa menyesuaikan warna latar belakang (misal: bg-gray-50 atau bg-blue-50) --}}
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Daerah di Yogyakarta</h2>

            {{-- Search Bar --}}
            <div class="relative mb-12 max-w-xl mx-auto">
                <input type="text" placeholder="Cari Daerah" class="w-full pl-5 pr-12 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            {{-- Scrollable Cards Container --}}
            <div class="flex space-x-6 overflow-x-auto pb-4"> {{-- Gunakan overflow-x-auto untuk gulir horizontal --}}
                
                {{-- Kartu 1: Sleman --}}
                <div class="flex-none w-72 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    {{-- Ganti 'images/sleman.jpg' dengan path gambar asli Anda untuk Sleman --}}
                    <img src="{{ asset('images/merapi.jpg') }}" alt="Gunung Merapi, Sleman" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-1">Sleman</h3>
                        <p class="text-gray-600 text-sm">
                            Kabupaten di bagian utara DIY, terkenal dengan Gunung Merapi dan wisata alamnya.
                        </p>
                    </div>
                </div>

                {{-- Kartu 2: Kota Yogyakarta --}}
                <div class="flex-none w-72 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    {{-- Ganti 'images/kota_yogyakarta.jpg' dengan path gambar asli Anda untuk Kota Yogyakarta --}}
                    <img src="{{ asset('images/malioboro.jpg') }}" alt="Malioboro, Kota Yogyakarta" class="w-full h-48 object-cover"> 
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-1">Kota Yogyakarta</h3>
                        <p class="text-gray-600 text-sm">
                            Ibu kota Provinsi DIY, pusat budaya dan pariwisata dengan keraton dan Malioboro.
                        </p>
                    </div>
                </div>

                {{-- Kartu 3: Gunungkidul --}}
                <div class="flex-none w-72 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    {{-- Ganti 'images/gunungkidul.jpg' dengan path gambar asli Anda untuk Gunungkidul --}}
                    <img src="{{ asset('images/pantai_indrayanti.jpg') }}" alt="Pantai Indrayanti, Gunungkidul" class="w-full h-48 object-cover"> 
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-1">Gunungkidul</h3>
                        <p class="text-gray-600 text-sm">
                            Kabupaten di bagian tenggara DIY, terkenal dengan deretan pantai pasir putihnya.
                        </p>
                    </div>
                </div>

                {{-- Kartu 4: Bantul --}}
                <div class="flex-none w-72 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    {{-- Ganti 'images/bantul.jpg' dengan path gambar asli Anda untuk Bantul --}}
                    <img src="{{ asset('images/parangtritis.jpg') }}" alt="Pantai Parangtritis, Bantul" class="w-full h-48 object-cover"> 
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-1">Bantul</h3>
                        <p class="text-gray-600 text-sm">
                            Kabupaten di bagian selatan DIY, memiliki berbagai destinasi wisata pantai dan seni.
                        </p>
                    </div>
                </div>

                {{-- Kartu 5: Kulon Progo --}}
                <div class="flex-none w-72 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    {{-- Ganti 'images/kulon_progo.jpg' dengan path gambar asli Anda untuk Kulon Progo --}}
                    <img src="{{ asset('images/kalibiru.jpg') }}" alt="Puncak Kalibiru, Kulon Progo" class="w-full h-48 object-cover"> 
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-1">Kulon Progo</h3>
                        <p class="text-gray-600 text-sm">
                            Kabupaten di bagian barat DIY, dengan keindahan perbukitan Menoreh dan spot wisata baru.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- BAGIAN 3: HIGHLIGHTS (Destinasi Populer) --}}
    <div class="w-full pb-16"> 

        {{-- Judul untuk bagian ini --}}
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6 px-4">Destinasi Populer</h2> 

        {{-- BAGIAN: Kategori Destinasi Favorit (Buble yang bisa diklik) --}}
        <div class="flex flex-wrap justify-center gap-4 mb-12 px-4"> 
            <a href="{{ url('/destinasi/alam') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-full shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                #Wisata Alam
            </a>
            <a href="{{ url('/destinasi/budaya') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-full shadow-md hover:bg-green-700 transition duration-300 transform hover:scale-105">
                #Situs Budaya
            </a>
            <a href="{{ url('/destinasi/kuliner') }}" class="px-6 py-3 bg-yellow-600 text-white font-semibold rounded-full shadow-md hover:bg-yellow-700 transition duration-300 transform hover:scale-105">
                #Kuliner Khas
            </a>
            <a href="{{ url('/destinasi/event') }}" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-full shadow-md hover:bg-red-700 transition duration-300 transform hover:scale-105">
                #Event & Festival
            </a>
            <a href="{{ url('/destinasi/sejarah') }}" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-full shadow-md hover:bg-purple-700 transition duration-300 transform hover:scale-105">
                #Tempat Sejarah
            </a>
        </div>

        {{-- Grid 3 kolom untuk kartu highlight --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4"> 

            {{-- Kartu 1: Keraton --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img src="{{ asset('images/kraton.jpg') }}" alt="Keraton Yogyakarta" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Keraton</h3>
                    <p class="text-gray-600 text-sm">
                        Keraton Ngayogyakarta Hadiningrat merupakan istana resmi Kesultanan yang kini berlokasi di Kota Yogyakarta.
                    </p>
                </div>
            </div>

            {{-- Kartu 2: Candi Prambanan --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img src="{{ asset('images/prambanan.jpg') }}" alt="Candi Prambanan" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Candi Prambanan</h3>
                    {{-- Konten teks dikosongkan sesuai gambar referensi --}}
                </div>
            </div>

            {{-- Kartu 3: Tambahkan Malioboro sebagai kartu di sini --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img src="{{ asset('images/malioboro2.jpg') }}" alt="Jalan Malioboro" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Malioboro</h3>
                    <p class="text-gray-600 text-sm">
                        Jalan Malioboro adalah ikon pariwisata Yogyakarta yang tak pernah sepi pengunjung.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection