@extends('layouts.app')

@section('title', 'Artikel Kategori: ' . $kategori->nama_kategori)

@push('styles')
<style>
    /* Styling hero section dan card artikel (disalin dari galeri_by_category.blade.php) */
    .page-banner {
        background-size: cover;
        background-position: center center;
    }
    .hero-overlay-darker {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.60);
    }
    .text-shadow-strong {
        text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
    }

    /* Styling untuk artikel card */
    .article-card {
        background-color: #fff;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .article-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }
    .article-card:hover img {
        transform: scale(1.05);
    }
    .article-meta {
        font-size: 0.875rem;
        color: #6b7280;
        display: flex;
        align-items: center;
    }
    .article-meta svg {
        margin-right: 0.25rem;
        width: 1rem;
        height: 1rem;
    }
    .article-meta .category-badge {
        background-color: rgba(0, 0, 0, 0.1);
        color: #374151;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>
@endpush

@section('content')
    {{-- Hero Section untuk Kategori Artikel --}}
    <div class="relative h-72 md:h-96 lozad page-banner"
         data-background-image="{{ asset('storage/artikel-kategori-banner.jpg') }}"> {{-- Gambar banner khusus kategori --}}
        <div class="hero-overlay-darker"></div>
        <div class="container mx-auto px-4 h-full flex items-center justify-center text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white relative z-10 leading-tight text-shadow-strong">
                Artikel Kategori: <br class="md:hidden">{{ $kategori->nama_kategori }}
            </h1>
        </div>
    </div>

    {{-- Breadcrumbs --}}
    <div class="container mx-auto px-4 mt-8 mb-6">
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:text-blue-600 hover:underline">Home</a></li>
                <li><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li><a href="{{ route('artikel.public') }}" class="hover:text-blue-600 hover:underline">Artikel</a></li>
                <li><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="font-medium text-gray-700" aria-current="page">{{ $kategori->nama_kategori }}</li>
            </ol>
        </nav>
    </div>

    {{-- Artikel Grid --}}
    <div class="container mx-auto px-4 py-8">
        @if($artikels->isEmpty())
            <p class="text-center text-gray-600 text-lg">Belum ada artikel dalam kategori ini.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($artikels as $artikel)
                    <a href="{{ route('artikel.show.public', ['slug' => $artikel->slug]) }}" class="article-card block">
                        <div class="relative overflow-hidden">
                            @if($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="lozad" data-src="{{ asset('storage/' . $artikel->gambar) }}">
                            @else
                                <img src="https://placehold.co/600x400/cccccc/333333?text=No+Image" alt="No Image" class="lozad">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <span class="absolute top-4 left-4 article-meta category-badge">
                                {{ $artikel->kategoriArtikel->nama_kategori ?? 'Uncategorized' }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 leading-tight">
                                {{ $artikel->judul }}
                            </h3>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="article-meta">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    {{ $artikel->created_at->format('d F Y') }}
                                </span>
                                <span class="article-meta ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    {{ $artikel->view_count }} dilihat
                                </span>
                            </div>
                            <p class="text-gray-700 text-base mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($artikel->isi), 150) }}
                            </p>
                            <span class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

@endsection

@push('scripts')
{{-- Lozad.js sudah dimuat di layouts/app.blade.php --}}
{{-- Alpine.js sudah dimuat di layouts/app.blade.php --}}
@endpush
