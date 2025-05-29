@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative mb-8">
        <!-- Menggunakan gambar lokal yang ada di folder public/images -->
        <img src="{{ asset('images/malioboro1.jpg') }}" alt="Malioboro" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>

    <!-- Highlights Section -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Highlight 1</h2>
            <p class="text-gray-600">Deskripsi</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Highlight 2</h2>
            <p class="text-gray-600">Deskripsi</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Highlight 3</h2>
            <p class="text-gray-600">Deskripsi</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">Highlight 4</h2>
            <p class="text-gray-600">Deskripsi</p>
        </div>
    </div>
@endsection
