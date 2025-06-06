@extends('layouts.app')

@section('title', $galeri->judul)

@push('styles')
<style>
    /* Styling untuk Header dengan Gambar Latar Belakang Penuh dan Overlay */
    .header-dominant {
        position: relative;
        width: 100%;
        height: 400px; /* Tinggi header sesuai gambar */
        background-size: cover;
        background-position: center center;
        display: flex;
        align-items: center; /* Konten di tengah vertikal */
        text-align: left; /* Teks di header rata kiri */
        color: white; /* Warna teks putih untuk header */
        overflow: hidden;
    }
    .header-dominant .overlay-dark {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.70); /* Overlay hitam seperti gambar */
        z-index: 1;
    }
    .header-dominant .content-wrapper {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1200px; /* Lebar maksimal content-wrapper di header */
        margin-left: 2rem; /* Jarak dari kiri seperti gambar */
        margin-right: auto;
        padding-left: 1rem; /* Padding internal */
        padding-right: 1rem;
    }
    @media (min-width: 768px) { /* md breakpoint */
        .header-dominant .content-wrapper {
            margin-left: 4rem; /* Sesuaikan margin-left untuk layar lebih besar */
        }
    }
    @media (min-width: 1024px) { /* lg breakpoint */
        .header-dominant .content-wrapper {
            margin-left: 6rem; /* Sesuaikan margin-left untuk layar desktop */
        }
    }
    .header-dominant h1 {
        font-size: 2.5rem; /* text-4xl */
        font-weight: bold;
        line-height: 1.2;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
        margin-bottom: 0.5rem;
    }
    .header-dominant .meta-info {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem; /* Jarak antar item meta */
        font-size: 0.875rem;
        color: #e5e7eb; /* text-gray-200 */
    }
    .header-dominant .meta-info span {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    .header-dominant .meta-info svg {
        width: 1rem;
        height: 1rem;
    }

    /* Styling untuk Konten Utama (Benar-benar Full Width) */
    .main-content-area {
        background-color: #ffffff; /* Latar belakang putih untuk konten */
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
        width: 100%; /* Lebar penuh */
        padding-left: 1rem; /* Padding horizontal default */
        padding-right: 1rem;
        line-height: 1.625;
        color: #374151; /* text-gray-800 */
        text-align: justify;
    }
    @media (min-width: 640px) { /* sm breakpoint */
        .main-content-area {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 1024px) { /* lg breakpoint */
        .main-content-area {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    /* Styling default untuk elemen HTML yang dihasilkan TinyMCE */
    .main-content-area .prose {
        max-width: none;
        margin-left: 0;
        margin-right: 0;
        padding: 0;
    }
    .main-content-area .prose img {
        max-width: 100%;
        height: auto;
        display: block;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        border-radius: 0.375rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .main-content-area .prose p {
        margin-bottom: 1rem;
        line-height: 1.75;
        font-size: 1.125rem;
    }
    .main-content-area .prose h1, .main-content-area .prose h2, .main-content-area .prose h3, .main-content-area .prose h4, .main-content-area .prose h5, .main-content-area .prose h6 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        line-height: 1.3;
    }
</style>
@endpush

@section('content')
<div class="w-full">
    {{-- Header Penuh Lebar dengan Gambar Latar Belakang dan Overlay Gelap --}}
    <div class="header-dominant lozad page-banner"
         data-background-image="{{ asset('storage/' . $galeri->gambar) }}"
         style="background-image: url('{{ asset('storage/' . $galeri->gambar) }}');"> {{-- Fallback style --}}
        <div class="overlay-dark"></div>
        <div class="content-wrapper">
            <h1>
                {{ $galeri->judul }}
            </h1>
            <div class="meta-info">
                {{-- ICON PENULIS BARU --}}
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Admin {{-- Teks "Admin" atau bisa diganti dengan nama penulis jika ada --}}
                </span>
                {{-- END ICON PENULIS BARU --}}

                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $galeri->created_at->format('d F Y') }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7.414 7.414a2 2 0 010 2.828l-5.657 5.657a2 2 0 01-2.828 0L3.586 13.414A2 2 0 013 12V7a4 4 0 014-4z" /></svg>
                    {{ $galeri->kategoriGaleri->nama_kategori }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ $galeri->view_count }} dilihat
                </span>
            </div>
        </div>
    </div>

    {{-- Konten Utama (Full Width) --}}
    <div class="main-content-area">
        <div class="main-content-article-body"> 
            {{-- Konten Keterangan dari TinyMCE --}}
            <div class="prose prose-lg lg:prose-xl max-w-none content-body">
                {!! $galeri->keterangan !!}
            </div>
            
            {{-- Tombol Kembali ke Daftar Galeri Kategori --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-wrap justify-start gap-3">
                <a href="{{ route('galeri.by.category.public', ['slug' => $galeri->kategoriGaleri?->slug ?? 'uncategorized']) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded text-sm">
                    &larr; Kembali ke Kategori Galeri {{ $galeri->kategoriGaleri?->nama_kategori ?? '' }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
