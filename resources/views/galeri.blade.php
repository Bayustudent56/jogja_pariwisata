@extends('layouts.app')

@section('title', 'Galeri Foto (Tailwind)')

@section('content')
    {{-- Page Banner --}}
    <div class="relative bg-cover bg-center h-72 md:h-96 lozad page-banner" {{-- Ditambahkan kelas 'page-banner' agar script Lozad bekerja --}}
         data-background-image="{{ asset('images/ratuboko.jpg') }}"
         style="background-image: url('{{ asset('images/ratuboko.jpg') }}');">
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
                    ['title' => 'Alam', 'image' => asset('images/merapi.jpg'), 'link' => '#art-culture'],
                    ['title' => 'Budaya & Sejarah', 'image' => asset('images/budaya.jpg'), 'link' => '#culinary'],
                    ['title' => 'Edukasi', 'image' => asset('images/sonobudoyo2.jpg'), 'link' => '#landscape'],
                    // PERUBAHAN PADA BARIS DI BAWAH INI
                    ['title' => 'Kreatif', 'image' => asset('images/artpaper.jpg'), 'link' => '#sports-adventure'],
                    ['title' => 'Kuliner Tradisional', 'image' => asset('images/gudeg.jpg'), 'link' => '#health-wellness'],
                    ['title' => 'Kuliner Kekinian', 'image' => asset('images/tempogelato.jpg'), 'link' => '#creative-economy'],
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
                        <h5 class="text-xl font-semibold text-white transition-colors duration-300 group-hover:text-gray-300">
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
   
        const observer = lozad('.lozad', {
            loaded: function(el) {
                el.classList.add('loaded');
                
                if(el.classList.contains('page-banner')) { 
                    const bgImage = el.getAttribute('data-background-image');
                    if (bgImage) {
                        el.style.backgroundImage = `url('${bgImage}')`;
                    }
                }
            }
        });
        observer.observe();

        
    });
</script>
@endpush