@extends('layouts.app')

@section('title', 'Galeri Foto (Tailwind)')

@section('content')
    {{-- Page Banner --}}
    <div class="relative bg-cover bg-center h-72 md:h-96 lozad"
         data-background-image="https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1655896926-apresiasi-kreasi-indonesia--aki--2022--cirebon-77-jpg-medium.jpg"
         style="background-image: url('https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1655896926-apresiasi-kreasi-indonesia--aki--2022--cirebon-77-jpg-medium.jpg');">
        {{-- Overlay tipis untuk kontras teks --}}
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container mx-auto px-4 h-full flex items-center justify-center text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white relative z-10 leading-tight">
                Rasakan keindahan dan ketenangan Jogja yang memukau.
            </h1>
        </div>
    </div>



    {{-- Breadcrumbs and Gallery --}}
    <div class="container mx-auto px-4 mt-10 mb-6">
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:text-blue-600 hover:underline">Home</a></li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </li>
                <li class="font-medium text-gray-700" aria-current="page">Photos</li>
            </ol>
        </nav>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-8">
            @php
                $galleryItems = [
                    ['title' => 'Art and Culture', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1673836431-photo-2022-12-24-10-05-37-jpg-thumb.jpg', 'link' => '#art-culture'],
                    ['title' => 'Culinary', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1620042335-kampung_sanjai-47-thumb.jpg', 'link' => '#culinary'],
                    ['title' => 'Landscape', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1638868870-merapi--kaliurang--yogyakarta--a-jpg-thumb.jpg', 'link' => '#landscape'],
                    ['title' => 'Sports & Adventure', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1658722655-764f5bab-7664-4f60-9986-a4c6f802b9f5-59931-00000b626936de66-jpg-thumb.jpg', 'link' => '#sports-adventure'],
                    ['title' => 'Health & Wellness', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1637073893-oxygen_concentrator_trip_com-15-thumb.jpg', 'link' => '#health-wellness'],
                    ['title' => 'Creative Economy', 'image' => 'https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1684480618-audiensi-dengan-asean-youth-26-jpg-thumb.jpg', 'link' => '#creative-economy'],
                ];
            @endphp

            @foreach($galleryItems as $item)
            <a href="{{ $item['link'] }}" class="group block rounded-xl overflow-hidden shadow-lg hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 ease-in-out">
                <div class="relative">
                    {{-- Image --}}
                    <img data-src="{{ $item['image'] }}" src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                         class="lozad w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                    {{-- Overlay Gradient --}}
                    <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    {{-- Title --}}
                    <div class="absolute bottom-0 left-0 p-5">
                        <h5 class="text-xl font-semibold text-white transition-colors duration-300 group-hover:text-yellow-300">
                            {{ $item['title'] }}
                        </h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

@endsection

@push('scripts')
{{-- Lozad.js (lazy loading) --}}
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
{{-- Alpine.js (untuk interaktivitas dropdown, jika Anda memilih menggunakannya) --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi Lozad
        const observer = lozad('.lozad', {
            loaded: function(el) {
                el.classList.add('loaded');
                // Untuk banner, jika menggunakan data-background-image, pastikan gambar benar-benar diterapkan
                if(el.classList.contains('page-banner')) {
                    const bgImage = el.getAttribute('data-background-image');
                    if (bgImage) {
                        el.style.backgroundImage = `url('${bgImage}')`;
                    }
                }
            }
        });
        observer.observe();

        // Tambahan: Jika Anda tidak menggunakan Alpine.js untuk dropdown Location,
        // Anda perlu menulis JavaScript kustom di sini untuk menangani show/hide panel dropdownnya.
    });
</script>
@endpush