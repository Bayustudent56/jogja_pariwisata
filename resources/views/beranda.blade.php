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
                <a href="/artikel/SLEMAN" class="block flex-none w-72">
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
                <a href="/artikel/Kota-Yogyakarta" class="block flex-none w-72">
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
                <a href="/artikel/Gunungkidul" class="block flex-none w-72">
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
                <a href="/artikel/Bantul" class="block flex-none w-72">
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
                <a href="/artikel/Kulon-Progo" class="block flex-none w-72">
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
                ['title' => 'Gudeg Khas Yogyakarta', 'image_path' => 'images/gudeg.jpg', 'alt' => 'Gudeg, makanan khas Yogyakarta', 'link' => '/galeri/gudeg-khas-yogyakarta'],
                ['title' => 'Sunset di Ratu Boko', 'image_path' => 'images/ratuboko.jpg', 'alt' => 'Candi Ratu Boko saat matahari terbenam', 'link' => '/galeri/sunset-di-ratu-boko'],
                ['title' => 'Megahnya Gunung Merapi', 'image_path' => 'images/merapi.jpg', 'alt' => 'Pemandangan Gunung Merapi dari kejauhan', 'link' => '/galeri/merapi'],
                ['title' => 'Tenangnya Waduk Sermo', 'image_path' => 'images/sermo.jpeg', 'alt' => 'Waduk Sermo di Kulon Progo', 'link' => '/galeri/sermo'],
                ['title' => 'Sejuknya Hutan Pinus', 'image_path' => 'images/pinusmangun.jpg', 'alt' => 'Hutan Pinus Mangunan', 'link' => '/galeri/pinus'],
                ['title' => 'Sejarah di Vredeburg', 'image_path' => 'images/vredeburg.jpg', 'alt' => 'Museum Benteng Vredeburg di Yogyakarta', 'link' => '/galeri/vredeburg'],
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
                        <h5 class="text-xl font-semibold text-white transition-colors duration-300 group-hover:text-gray-300">
                            {{ $item['title'] }}
                        </h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- BAGIAN 4: ARTIKEL (Layout Kartu DENGAN GAMBAR KECIL DI KIRI) --}}
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            {{-- Header Artikel --}}
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Artikel</h2>
                    <p class="text-gray-500">Baca lebih lanjut tentang keindahan Yogyakarta.</p>
                </div>
                <a href="/artikel/" class="text-blue-600 font-semibold hover:underline whitespace-nowrap">Lihat Semua &rarr;</a>
            </div>

            @php
                $articleItems = [
                    [
                        'date' => '6 Juni 2025',
                        'title' => 'Kebun Buah Mangunan: Menikmati Keindahan Alam dari Ketinggian dengan Panorama Spektakuler',
                        'image_path' => 'images/vredeburg.jpg', // Placeholder for a new image, replace with your actual image
                        'alt' => 'Pemandangan alam',
                        'link' => '/artikel/kebun-buah-mangunan-menikmati-keindahan-alam-dari-ketinggian-dengan-panorama-spektakuler',
                        'recommendations' => [
                            'Menambah daftar panjang pesona alam di kawasan Dlingo, Bantul, Kebun Buah Mangunan menawarkan perspektif keindahan yang berbeda. Terletak tak jauh dari ikonik Hutan Pinus Mangunan, destinasi ini memanjakan mata dengan panorama alam perbukitan yang memukau dari ketinggian, menjadikannya lokasi ideal untuk menikmati keagungan alam Yogyakarta, terutama saat-saat matahari terbit atau terbenam.',
                        ]
                    ],
                    [
                        'date' => '6 Juni 2025',
                        'title' => 'Keraton Jogjakarta',
                        'image_path' => 'images/kraton.jpg', // Placeholder for a new image, replace with your actual image
                        'alt' => 'Pemandangan kota',
                        'link' => '/artikel/sleman',
                        'recommendations' => [
                            'Malioboro Jogja',
                        ]
                    ],
                    [
                        'date' => '6 Juni 2025',
                        'title' => 'Tugu Jogja',
                        'image_path' => 'images/tugujogja.jpg', // Placeholder for a new image, replace with your actual image
                        'alt' => 'Pemandangan pantai',
                        'link' => '/artikel/jogja',
                        'recommendations' => [
                            'Tugu Jogja',
                        ]
                    ],
                    [
                        'date' => '6 Juni 2025',
                        'title' => '10 Rekomendasi Wisata di Jogja',
                        'image_path' => 'images/panguk_kadiwung.jpg', // Placeholder for a new image, replace with your actual image
                        'alt' => 'Pemandangan gunung',
                        'link' => '/artikel/panguk-kadiwung',
                        'recommendations' => [
                            'Panguk Kadiwung',
                            'Malioboro',
                            'Museum Soeharto',
                        ]
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                @foreach($articleItems as $article)
                <a href="{{ $article['link'] }}" class="group block bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-xl active:shadow-inner active:scale-[0.99]">
                    <div class="flex items-center"> {{-- Menggunakan flex untuk tata letak gambar dan teks berdampingan --}}
                        <div class="flex-none w-40 h-40 overflow-hidden rounded-l-xl"> {{-- Ukuran gambar tetap dan rounded di kiri --}}
                            <img src="{{ asset($article['image_path']) }}" alt="{{ $article['alt'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex-grow"> {{-- Konten teks mengambil sisa ruang --}}
                            <p class="text-gray-500 text-xs mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $article['date'] }}
                            </p>
                            <h3 class="font-semibold text-gray-800 mb-2 text-base">{{ $article['title'] }}</h3>
                            <ul class="text-gray-600 text-xs list-disc pl-4 space-y-0.5">
                                @foreach($article['recommendations'] as $recommendation)
                                    <li>{{ $recommendation }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <a href="#" class="text-blue-600 font-semibold hover:underline whitespace-nowrap">Lihat Semua &rarr;</a>
        </div>


        </div>
    </div>
@endsection
