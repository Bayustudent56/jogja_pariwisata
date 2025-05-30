@extends('layouts.app')

@section('content')
    {{-- 
        Untuk warna latar belakang seperti di gambar, tambahkan kelas bg-amber-50 atau bg-orange-50 
        atau warna custom Anda ke tag <body> di file layouts/app.blade.php.
        Contoh: <body class="bg-amber-50">
    --}}

    {{-- BAGIAN 1: HERO BANNER "JL. MALIOBORO" --}}
    {{-- Dibuat full-width, tanpa padding horizontal di sekelilingnya --}}
    <div class="w-full">
        <div class="w-full h-80">
            {{-- Pastikan nama file banner ini benar. Sesuai gambar, ini bukan 'malioboro1.jpg' --}}
            <img src="{{ asset('images/malioboro1.jpg') }}" alt="Banner Malioboro" class="w-full h-full object-cover">
        </div>
    </div>

    {{-- BAGIAN 2: FEATURED (VREDEBURG) --}}
    {{-- Kita gunakan container di sini untuk memberi batas kiri dan kanan pada konten di bawah banner --}}
    <div class="container mx-auto px-4">
        {{-- 'py-16' memberikan jarak vertikal (padding atas dan bawah) antara banner dan konten di bawahnya --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center py-16">
            
            {{-- Kolom Gambar Vredeburg --}}
            <div>
                {{-- Gambar sekarang berdiri sendiri dengan sudut membulat dan bayangan --}}
                <img src="{{ asset('images/vredeburg.jpg') }}" alt="Benteng Vredeburg" class="rounded-xl shadow-xl w-full h-full object-cover">
            </div>

            {{-- Kolom Konten Vredeburg --}}
            {{-- Teks sekarang berada langsung di atas warna latar belakang halaman, tidak di dalam kartu putih --}}
            <div class="p-6">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Vredeburg</h2>
                <p class="text-gray-600 leading-relaxed">
                    Museum Benteng Vredeburg adalah sebuah benteng yang terletak di depan Gedung Agung dan Istana Kesultanan Yogyakarta. Alamatnya ada di Jl. A. Yani No. 6, Yogyakarta. Saat ini, benteng ini menjadi sebuah museum. Di sejumlah bangunan di dalam benteng ini terdapat diorama mengenai sejarah Indonesia.
                </p>
            </div>
        </div>
    </div>


    {{-- BAGIAN 3: HIGHLIGHTS (KERATON, PRAMBANAN, MALIOBORO) --}}
    {{-- 'pb-16' untuk memberi padding bawah di akhir halaman --}}
    <div class="container mx-auto px-4 pb-16">
        
        {{-- Judul untuk bagian ini --}}
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Destinasi Populer</h2>
        
        {{-- Grid 3 kolom untuk kartu highlight --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
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

            {{-- Kartu 3: Malioboro --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img src="{{ asset('images/malioboro2.jpg') }}" alt="Jalan Malioboro" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Malioboro</h3>
                    {{-- Konten teks dikosongkan sesuai gambar referensi --}}
                </div>
            </div>

        </div>
    </div>
@endsection