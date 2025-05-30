@extends('layouts.app')

@section('content')
    <!-- Hero Section (Carousel) -->
    <div x-data="{ activeImage: 0, totalImages: 4 }" class="relative mb-8">
        <!-- Carousel Wrapper -->
        <div class="overflow-hidden relative">
            <div class="flex transition-all duration-500 ease-in-out" :style="`transform: translateX(-${activeImage * 100}%)`">
                <!-- Gambar 1 -->
                <img src="{{ asset('images/suharto.jpg') }}" alt="Suharto" class="w-full h-96 object-cover rounded-lg shadow-md">
                <!-- Gambar 2 -->
                <img src="{{ asset('images/vredeburg.jpg') }}" alt="Vredeburg" class="w-full h-96 object-cover rounded-lg shadow-md">
                <!-- Gambar 3 -->
                <img src="{{ asset('images/tugu.webp') }}" alt="Tugu" class="w-full h-96 object-cover rounded-lg shadow-md">
                <!-- Gambar 4 -->
                <img src="{{ asset('images/borobudur.jpg') }}" alt="Borobudur" class="w-full h-96 object-cover rounded-lg shadow-md">
                <!-- Gambar 4 -->
                <img src="{{ asset('images/borobudur.jpg') }}" alt="Borobudur" class="w-full h-96 object-cover rounded-lg shadow-md">
                <!-- Gambar 4 -->
                <img src="{{ asset('images/borobudur.jpg') }}" alt="Borobudur" class="w-full h-96 object-cover rounded-lg shadow-md">
            </div>

            <!-- Navigation (Previous and Next buttons) -->
            <button @click="activeImage = (activeImage > 0) ? activeImage - 1 : activeImage"
                    :disabled="activeImage === 0"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full shadow-md">
                &lt;
            </button>
            <button @click="activeImage = (activeImage < totalImages - 1) ? activeImage + 1 : activeImage"
                    :disabled="activeImage === totalImages - 1"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full shadow-md">
                &gt;
            </button>
        </div>
    </div>

    <!-- Highlights Section -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Highlight 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/vredeburg.jpg') }}" alt="Vredeburg" class="w-full h-40 object-cover rounded-lg mb-4">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Vredeburg</h2>
            <p class="text-gray-600">Museum Benteng Vredeburg adalah sebuah bangunan benteng pertahanan yang terletak di depan Gedung Agung dan Kraton Kesultanan Yogyakarta.</p>
        </div>

        <!-- Highlight 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/tugu.webp') }}" alt="Tugu" class="w-full h-40 object-cover rounded-lg mb-4">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Tugu</h2>
            <p class="text-gray-600">Deskripsi Tugu</p>
        </div>

        <!-- Highlight 3 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/borobudur.jpg') }}" alt="Borobudur" class="w-full h-40 object-cover rounded-lg mb-4">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Borobudur</h2>
            <p class="text-gray-600">Deskripsi Borobudur</p>
        </div>

        <!-- Highlight 4 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/suharto.jpg') }}" alt="Suharto" class="w-full h-40 object-cover rounded-lg mb-4">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Suharto</h2>
            <p class="text-gray-600">Deskripsi Suharto</p>
        </div>
    </div>
@endsection
