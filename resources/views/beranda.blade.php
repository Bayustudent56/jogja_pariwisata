@extends('layouts.app')

@section('content')
    {{--
        Untuk warna latar belakang seperti di gambar, tambahkan kelas bg-amber-50 atau bg-orange-50
        atau warna custom Anda ke tag <body> di file layouts/app.blade.php.
        Contoh: <body class="bg-amber-50">
    --}}

    {{-- BAGIAN 1: HERO BANNER (GAMBAR STATIS) --}}
    <div class="w-full relative h-screen overflow-hidden">

        {{-- Gambar Utama --}}
        <img src="{{ asset('images/prambanan3.jpg') }}"
             alt="Pemandangan Candi Prambanan"
             class="w-full h-full object-cover object-center">

        {{-- Overlay semi-transparan (Opsional, untuk readability teks di atas gambar) --}}
        <div class="absolute inset-0 bg-black opacity-20"></div>

        {{-- Teks di atas gambar --}}
        <div class="absolute inset-0 flex flex-col justify-center items-start text-white text-left p-8 md:p-16">
            <div class="max-w-4xl w-full">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-normal leading-tight md:leading-snug mb-4">
                    Welcome to <br> <span class="font-semibold">XploreJogja</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl font-light leading-relaxed">
                    Unforgettable Journey
                </p>
            </div>
        </div>
    </div>

    {{-- BAGIAN 2: DAFTAR DAERAH DI YOGYAKARTA --}}
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center md:text-left">Daerah di Yogyakarta</h2>

            {{-- Scrollable Cards Container --}}
            <div class="flex space-x-6 overflow-x-auto pb-4 p-2">

                {{-- Kartu 1: Sleman --}}
                <a href="#" class="block flex-none w-72">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 h-full transition-all duration-200 hover:shadow-xl hover:-translate-y-1 active:shadow-inner active:scale-[0.98]">
                        <img src="{{ asset('images/merapi.jpg') }}" alt="Gunung Merapi, Sleman" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">Sleman</h3>
                            <p class="text-gray-600 text-sm">
                                Kabupaten di bagian utara DIY, terkenal dengan Gunung Merapi dan wisata alamnya.
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Kartu 2: Kota Yogyakarta --}}
                <a href="#" class="block flex-none w-72">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 h-full transition-all duration-200 hover:shadow-xl hover:-translate-y-1 active:shadow-inner active:scale-[0.98]">
                        <img src="{{ asset('images/malbor.jpg') }}" alt="Malioboro, Kota Yogyakarta" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">Kota Yogyakarta</h3>
                            <p class="text-gray-600 text-sm">
                                Ibu kota Provinsi DIY, pusat budaya dan pariwisata dengan keraton dan Malioboro.
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Kartu 3: Gunungkidul --}}
                <a href="#" class="block flex-none w-72">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 h-full transition-all duration-200 hover:shadow-xl hover:-translate-y-1 active:shadow-inner active:scale-[0.98]">
                        <img src="{{ asset('images/klanyar.jpg') }}" alt="Pantai Indrayanti, Gunungkidul" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">Gunungkidul</h3>
                            <p class="text-gray-600 text-sm">
                                Kabupaten di bagian tenggara DIY, terkenal dengan deretan pantai pasir putihnya.
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Kartu 4: Bantul --}}
                <a href="#" class="block flex-none w-72">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 h-full transition-all duration-200 hover:shadow-xl hover:-translate-y-1 active:shadow-inner active:scale-[0.98]">
                        <img src="{{ asset('images/parangtritis.jpg') }}" alt="Pantai Parangtritis, Bantul" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">Bantul</h3>
                            <p class="text-gray-600 text-sm">
                                Kabupaten di bagian selatan DIY, memiliki berbagai destinasi wisata pantai dan seni.
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Kartu 5: Kulon Progo --}}
                <a href="#" class="block flex-none w-72">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 h-full transition-all duration-200 hover:shadow-xl hover:-translate-y-1 active:shadow-inner active:scale-[0.98]">
                        <img src="{{ asset('images/kalibiru.jpg') }}" alt="Puncak Kalibiru, Kulon Progo" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">Kulon Progo</h3>
                            <p class="text-gray-600 text-sm">
                                Kabupaten di bagian barat DIY, dengan keindahan perbukitan Menoreh dan spot wisata baru.
                            </p>
                        </div>
                    </div>
                </a>
    
            </div>
        </div>
    </div>


    {{-- BAGIAN 3: GALERI (Layout Kartu DENGAN EFEK HOVER TEKS ABU-ABU) --}}
    <div class="bg-white py-16 px-4 md:px-8 lg:px-16">
        {{-- Header Galeri --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Galeri</h2>
                <p class="text-gray-500">Momen tak terlupakan yang dibagikan oleh para wisatawan.</p>
            </div>
            <a href="#" class="text-blue-600 font-semibold hover:underline whitespace-nowrap">Lihat Semua &rarr;</a>
        </div>

        @php
            $galleryItemsJogja = [
                ['title' => 'Gudeg Khas Yogyakarta', 'image_path' => 'images/gudeg.jpg', 'alt' => 'Gudeg, makanan khas Yogyakarta', 'link' => '#gudeg'],
                ['title' => 'Sunset di Ratu Boko', 'image_path' => 'images/ratuboko.jpg', 'alt' => 'Candi Ratu Boko saat matahari terbenam', 'link' => '#ratuboko'],
                ['title' => 'Megahnya Gunung Merapi', 'image_path' => 'images/merapi.jpg', 'alt' => 'Pemandangan Gunung Merapi dari kejauhan', 'link' => '#merapi'],
                ['title' => 'Tenangnya Waduk Sermo', 'image_path' => 'images/sermo.jpeg', 'alt' => 'Waduk Sermo di Kulon Progo', 'link' => '#sermo'],
                ['title' => 'Sejuknya Hutan Pinus', 'image_path' => 'images/pinusmangun.jpg', 'alt' => 'Hutan Pinus Mangunan', 'link' => '#pinus'],
                ['title' => 'Sejarah di Vredeburg', 'image_path' => 'images/vredeburg.jpg', 'alt' => 'Museum Benteng Vredeburg di Yogyakarta', 'link' => '#vredeburg'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($galleryItemsJogja as $item)
            <a href="{{ $item['link'] }}" class="group block rounded-xl overflow-hidden shadow-lg hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 ease-in-out">
                <div class="relative">
                    {{-- Image --}}
                    <img src="{{ asset($item['image_path']) }}" alt="{{ $item['alt'] }}"
                         class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                    {{-- Overlay Gradient --}}
                    <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    {{-- Title --}}
                    <div class="absolute bottom-0 left-0 p-5">
                        {{-- PERUBAHAN WARNA HOVER TEKS DI SINI --}}
                        <h5 class="text-xl font-semibold text-white transition-colors duration-300 group-hover:text-gray-300">
                            {{ $item['title'] }}
                        </h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- BAGIAN 4: ARTIKEL --}}
    <div class="bg-gray-100 py-16 px-4 md:px-8 lg:px-16">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Artikel</h2>
                <a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Lihat Selengkapnya <span aria-hidden="true">&rarr;</span></a>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Artikel 1 --}}
                <a href="#" class="block bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-xl active:shadow-inner active:scale-[0.99]">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2">
                            <img src="{{ asset('images/artikel1.jpg') }}" alt="10 Rekomendasi Wisata di Indonesia" class="w-full h-48 md:h-full object-cover">
                        </div>
                        <div class="p-4 md:p-6 md:w-1/2 flex flex-col">
                            <p class="text-gray-500 text-xs mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                6 Juli 2023
                            </p>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">10 Rekomendasi Wisata di Indonesia</h3>
                            <ul class="list-disc list-inside text-gray-600 text-xs space-y-1">
                                <li>Candi Borobudur di Magelang</li>
                                <li>Tanjung Kelayang di Belitung</li>
                                <li>Mandalika di Nusa Tenggara Barat</li>
                            </ul>
                        </div>
                    </div>
                </a>
    
                {{-- Artikel 2 --}}
                <a href="#" class="block bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-xl active:shadow-inner active:scale-[0.99]">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2">
                            <img src="{{ asset('images/artikel2.jpg') }}" alt="Jelajah Kuliner Jateng & Jogja" class="w-full h-48 md:h-full object-cover">
                        </div>
                        <div class="p-4 md:p-6 md:w-1/2 flex flex-col">
                            <p class="text-gray-500 text-xs mb-2 flex items-center">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                3 Juli 2023
                            </p>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">Jelajah Kuliner Jateng & Jogja</h3>
                            <p class="text-gray-600 text-xs leading-relaxed">
                                Jawa Tengah dan Yogyakarta terus mempesona tak hanya dengan destinasi wisata nan memukau, tapi kekayaan budaya kulinernya...
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Artikel 3 --}}
                <a href="#" class="block bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-xl active:shadow-inner active:scale-[0.99]">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2">
                            <img src="{{ asset('images/artikel3.jpg') }}" alt="Pakaian Adat: Arti, Contoh, dan Fungsinya" class="w-full h-48 md:h-full object-cover object-top">
                        </div>
                        <div class="p-4 md:p-6 md:w-1/2 flex flex-col">
                            <p class="text-gray-500 text-xs mb-2 flex items-center">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                25 Juni 2023
                            </p>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">Pakaian Adat: Arti, Contoh, dan Fungsinya</h3>
                            <p class="text-gray-600 text-xs leading-relaxed">
                                Pakaian Adat digunakan untuk menampilkan perayaan upacara, menunjukkan status maupun membedakan peran.
                            </p>
                        </div>
                    </div>
                </a>
    
                {{-- Artikel 4 --}}
                <a href="#" class="block bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-xl active:shadow-inner active:scale-[0.99]">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2">
                            <img src="{{ asset('images/artikel4.jpg') }}" alt="Filosofi Tari Pendet Berdasarkan Sejarah Budaya Bali" class="w-full h-48 md:h-full object-cover object-center">
                        </div>
                        <div class="p-4 md:p-6 md:w-1/2 flex flex-col">
                            <p class="text-gray-500 text-xs mb-2 flex items-center">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                8 Juni 2023
                            </p>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">Filosofi Tari Pendet Berdasarkan Sejarah</h3>
                            <p class="text-gray-600 text-xs leading-relaxed">
                                Tarian ini sering muncul untuk menyambut tamu-tamu penting para dewa-dewi. Tari pendet merupakan perwujudan rasa syukur.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- BAGIAN 5: HIGHLIGHTS (Destinasi Populer) --}}
    <div class="w-full pb-16 bg-white pt-16">

        {{-- Judul untuk bagian ini --}}
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6 px-4">Destinasi Populer</h2>

        {{-- BAGIAN: Kategori Destinasi Favorit --}}
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 max-w-7xl mx-auto">

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
                    <p class="text-gray-600 text-sm">
                        Kompleks candi Hindu terbesar di Indonesia yang dibangun pada abad ke-9 Masehi.
                    </p>
                </div>
            </div>

            {{-- Kartu 3: Malioboro --}}
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