@extends('layouts.admin')

@section('title', $galeri->judul)

@push('styles')
<style>
    /* Styling umum untuk hero section dan konten (disalin dari show.blade.php artikel) */
    .hero-section-full {
        background-size: cover;
        background-position: center center;
        position: relative;
        color: white;
        width: 100%;
        padding-top: 4rem;
        padding-bottom: 4rem;
        min-height: 40vh;
        display: flex;
        align-items: center;
    }
    
    .hero-overlay-darker {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.70);
        z-index: 1;
    }
    .hero-content-container {
        position: relative;
        z-index: 2;
        width: 100%;
    }
    .hero-meta-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 0.75rem;
    }
    .hero-meta-item {
        display: inline-flex;
        align-items: center;
        margin-right: 1.5rem;
        margin-bottom: 0.25rem;
    }
    .hero-meta svg {
        margin-right: 0.4rem;
    }
    .text-shadow-strong {
        text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
    }

    /* Styling untuk area konten utama dari TinyMCE */
    .content-area {
        background-color: #ffffff;
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
        /* Tambahkan padding horizontal di sini untuk memastikan konten tidak menempel ke tepi layar */
        /* Ini akan berlaku untuk seluruh area konten, termasuk artikel di dalamnya */
        padding-left: 1rem;
        padding-right: 1rem;
    }
    @media (min-width: 640px) { /* sm breakpoint */
        .content-area {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 1024px) { /* lg breakpoint */
        .content-area {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    .content-article {
        max-width: none; /* Memastikan konten artikel akan mengisi lebar penuh container-nya */
        /* Hapus padding-left/right di sini karena sudah dihandle di .content-area */
        padding-left: 0; 
        padding-right: 0;
    }
    
    /* Styling default untuk elemen HTML yang dihasilkan TinyMCE */
    .content-body img {
        max-width: 100%;
        height: auto;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        border-radius: 0.375rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .content-body p {
        margin-bottom: 1.25rem;
        line-height: 1.75;
        font-size: 1.125rem;
    }
    .content-body h1, .content-body h2, .content-body h3, .content-body h4, .content-body h5, .content-body h6 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        line-height: 1.3;
    }
</style>
@endpush

@section('content')
<div class="w-full">
    {{-- HERO SECTION --}}
    @if($galeri->gambar)
    <div class="hero-section-full" style="background-image: url('{{ asset('storage/' . $galeri->gambar) }}');">
        <div class="hero-overlay-darker"></div>
        <div class="hero-content-container container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white mb-2 leading-tight text-shadow-strong text-left">
                {{ $galeri->judul }}
            </h1>

            {{-- Meta Info di Hero (sesuai gaya artikel) --}}
            <div class="hero-meta-container text-sm text-gray-200">
                <span class="hero-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    {{-- Format tanggal yang aman --}}
                    {{ $galeri->created_at->isoFormat('D MMMM YYYY') }}
                </span>
                <span class="hero-meta-item">
                    @if($galeri->kategoriGaleri)
                    <span class="bg-white bg-opacity-20 text-white px-2 py-0.5 rounded-full text-xs font-semibold uppercase tracking-wider mr-2">
                        {{ $galeri->kategoriGaleri->nama_kategori }}
                    </span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    {{ $galeri->view_count }} dilihat
                </span>
            </div>
        </div>
    </div>
    @else
    {{-- Fallback jika tidak ada gambar utama (sesuai gaya artikel) --}}
    <div class="bg-gray-800 text-white py-12">
        <div class="hero-content-container container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl sm:text-4xl font-bold mb-2 text-left">
                {{ $galeri->judul }}
            </h1>
            <div class="hero-meta-container text-sm text-gray-300">
                <span class="hero-meta-item">Dibuat:
                    {{ $galeri->created_at->isoFormat('D MMMM YYYY') }}
                </span>
                <span class="hero-meta-item">
                    @if($galeri->kategoriGaleri)
                    <span class="bg-white bg-opacity-25 text-white px-2 py-0.5 rounded-full text-xs font-semibold uppercase tracking-wider mr-2">
                        {{ $galeri->kategoriGaleri->nama_kategori }}
                    </span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    {{ $galeri->view_count }} dilihat
                </span>
            </div>
        </div>
    </div>
    @endif

    {{-- KONTEN UTAMA - FULL WIDTH --}}
    <div class="content-area">
        {{-- Hapus div class="container mx-auto" ini --}}
        <article class="content-article">
            {{-- Konten Isi Artikel dari TinyMCE --}}
            <div class="prose prose-lg lg:prose-xl max-w-none content-body text-gray-700">
                {!! $artikel->isi !!}
            </div>

            {{-- Tombol Aksi (Edit/Hapus) --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-wrap justify-start gap-3">
                <a href="{{ route('tambahartikel.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded text-sm">
                    &larr; Kembali ke Daftar Artikel
                </a>
                <a href="{{ route('tambahartikel.edit', $artikel->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded text-sm">
                    Edit Artikel Ini
                </a>
                <form action="{{ route('tambahartikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus artikel ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm">
                        Hapus Artikel Ini
                    </button>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection
