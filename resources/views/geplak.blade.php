@extends('layouts.app')

@section('content')
<!-- Header dengan gambar dan border bawah oval -->
<div class="relative w-full overflow-hidden">
    <!-- Gambar header -->
    <img src="{{ asset('images/geplak.jpg') }}" alt="Geplak" class="w-full h-60 object-cover">


    <!-- Overlay putih transparan -->
    <div class="absolute inset-0 bg-white bg-opacity-70 rounded-b-[100px]"></div>

    <!-- Konten judul -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 text-gray-800">
        <h1 class="text-xl md:text-3xl font-bold">Geplak Mbok Tumpuk: Warisan Manis dari Bantul, Yogyakarta</h1>
        <div class="flex flex-wrap items-center gap-4 text-sm mt-2">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 10l4.553 2.276A2 2 0 0121 14.118V18a2 2 0 01-2 2H5a2 2 0 01-2-2v-3.882a2 2 0 011.447-1.842L9 10m6 0V5a3 3 0 00-6 0v5m6 0H9" />
                </svg>
                Anya
            </span>
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                6 Juli 2023
            </span>
        </div>
    </div>
</div>

<!-- Breadcrumb bubble -->
<div class="flex justify-center -mt-6 z-10 relative">
    <div class="bg-white shadow-md rounded-full px-6 py-2 text-sm text-gray-700">
        <a href="/" class="hover:text-blue-600">Home</a> › 
        <a href="/kategori/makanan" class="hover:text-blue-600">Makanan</a> › 
        <span class="text-blue-600 font-semibold">Geplak Mbok Tumpuk</span>
    </div>
</div>

<!-- Konten Artikel -->
<div class="max-w-5xl mx-auto mt-6 px-4 pb-12 leading-relaxed text-gray-800 text-justify">
    <p class="mb-4">
        Geplak Mbok Tumpuk adalah salah satu ikon kuliner tradisional khas Bantul, Yogyakarta, yang telah melegenda sejak puluhan tahun lalu. Terbuat dari parutan kelapa yang dicampur gula dan pewarna alami, geplak ini dikenal dengan cita rasa manis legit yang khas, serta tampilan warna-warni yang mencolok. 
    </p>

    <p class="mb-4">
        Nama “Mbok Tumpuk” sendiri berasal dari sosok legendaris pembuat geplak yang menjadi pelopor produksi geplak rumahan di Bantul. Sejak dulu, Mbok Tumpuk dikenal dengan keahliannya membuat geplak secara tradisional menggunakan resep turun-temurun tanpa bahan pengawet, dan masih dipertahankan hingga sekarang.
    </p>

    <p class="mb-4">
        Geplak buatan Mbok Tumpuk tidak hanya dijual sebagai oleh-oleh khas, tetapi juga menjadi simbol budaya masyarakat Bantul. Geplak ini menggambarkan kesederhanaan hidup masyarakat Jawa yang mampu menciptakan sesuatu yang manis dan menyenangkan dari bahan-bahan lokal.
    </p>

    <p class="mb-4">
        Ciri khas Geplak Mbok Tumpuk terletak pada kelembutan kelapa parutnya, aroma kelapa segar yang masih terasa, serta sensasi manis yang tidak berlebihan. Proses pembuatannya pun masih dilakukan secara manual, mulai dari pemarutan kelapa hingga pencetakan bola-bola kecil yang kemudian dikeringkan.
    </p>

    <p class="mb-4">
        Tidak heran jika geplak ini menjadi buruan wisatawan yang ingin merasakan nuansa otentik Jogja melalui cita rasa kulinernya. Produk-produk Geplak Mbok Tumpuk pun kini bisa ditemukan di berbagai pusat oleh-oleh di Yogyakarta, terutama di wilayah Bantul, dengan kemasan modern namun tetap mempertahankan nilai tradisionalnya.
    </p>

    <p class="mb-4">
        Menikmati geplak bukan hanya tentang rasa manisnya, tetapi juga mengenang cerita perjuangan dan dedikasi Mbok Tumpuk dalam melestarikan kuliner tradisional. Di tengah gempuran makanan modern, geplak tetap bertahan sebagai simbol rasa dan budaya.
    </p>

    <p class="mt-6 font-semibold italic text-center">
        “Geplak bukan sekadar camilan, tapi bagian dari warisan budaya Jogja yang layak dijaga.”
    </p>
</div>
@endsection
