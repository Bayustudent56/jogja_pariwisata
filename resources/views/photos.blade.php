{{-- resources/views/photos.blade.php --}}
@extends('layouts.app')

@section('title', 'Photos')

@section('content')
    <div class="page-banner lozad" data-background-image="https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1660882405-9df1f863-4bfe-49fa-bc25-a3dd0b26c6a5-34009-000004e390a0dfff-jpg-medium.jpg">
        <div class="container text-center">
            <h1>Kota jogja asri nyaman dan nyaman untuk ditinggali adalah suatu kebanggaan bagi warganya</h1>
        </div>
    </div>

    {{-- Bagian Search dan Filter --}}
    <div class="container mt-4 mb-5">
        <form action="{{ url('/photos/search') }}" method="GET"> {{-- Ganti URL action jika perlu --}}
            <div class="row justify-content-center mb-3">
                <div class="col-md-10 col-lg-8">
                    <input type="text" name="keyword" class="form-control form-control-lg" placeholder="I want to search..." value="{{ request('keyword') }}">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto mb-2 mb-md-0">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="allMediaDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Media <span id="selectedMediaText" class="font-weight-bold"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="allMediaDropdown">
                            <a class="dropdown-item filter-media" href="#" data-value="">All Media</a>
                            <a class="dropdown-item filter-media" href="#" data-value="photo">Photo</a>
                            <a class="dropdown-item filter-media" href="#" data-value="video">Video</a>
                        </div>
                        <input type="hidden" name="media_type" id="media_type_input" value="{{ request('media_type') }}">
                    </div>
                </div>
                <div class="col-auto mb-2 mb-md-0">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="locationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Location <span id="selectedLocationText" class="font-weight-bold"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="locationDropdown">
                            {{-- Contoh statis, sesuaikan jika data dinamis --}}
                            <a class="dropdown-item filter-location" href="#" data-value="">All Province</a>
                            <a class="dropdown-item filter-location" href="#" data-value="province_jakarta">DKI Jakarta</a> {{-- Contoh --}}
                            <a class="dropdown-item filter-location" href="#" data-value="province_bali">Bali</a> {{-- Contoh --}}
                            <hr>
                            <a class="dropdown-item filter-location" href="#" data-value="">All City</a>
                            <a class="dropdown-item filter-location" href="#" data-value="city_denpasar">Denpasar</a> {{-- Contoh --}}
                        </div>
                        <input type="hidden" name="location" id="location_input" value="{{ request('location') }}">
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    {{-- Akhir Bagian Search dan Filter --}}


    <div class="container mt-5">
        <div class="row">
            {{-- Daftar kategori foto (bisa looping dari controller) --}}
            <div class="col-lg-4">
                <a href="#" class="thumbnail-default">
                    <img data-src="https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1638245224-atraksi-budaya-prajurit-solo----jpg-thumb.jpg" class="card-img lozad" alt="Art and Culture">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Art and Culture</h5>
                    </div>
                </a>
            </div>
            {{-- Tambah kolom lainnya jika diperlukan --}}
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Script untuk memperbarui teks tombol dropdown dan hidden input saat item dipilih

    // Untuk dropdown All Media
    const mediaDropdownItems = document.querySelectorAll('.filter-media');
    const selectedMediaText = document.getElementById('selectedMediaText');
    const mediaTypeInput = document.getElementById('media_type_input');
    const allMediaDropdownButton = document.getElementById('allMediaDropdown');

    // Set initial text for media dropdown based on current query param
    if (mediaTypeInput.value) {
        const currentMediaItem = Array.from(mediaDropdownItems).find(item => item.dataset.value === mediaTypeInput.value);
        if (currentMediaItem && currentMediaItem.dataset.value !== "") {
            selectedMediaText.textContent = `: ${currentMediaItem.textContent}`;
        } else if (currentMediaItem && currentMediaItem.dataset.value === "") {
             selectedMediaText.textContent = ""; // Show nothing if "All Media"
        }
    }


    mediaDropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const value = this.dataset.value;
            const text = this.textContent;
            mediaTypeInput.value = value;
            if (value === "") { // "All Media"
                 selectedMediaText.textContent = "";
                 allMediaDropdownButton.childNodes[0].nodeValue = "All Media ";
            } else {
                selectedMediaText.textContent = `: ${text}`;
                allMediaDropdownButton.childNodes[0].nodeValue = "All Media ";
            }
        });
    });

    // Untuk dropdown Location
    const locationDropdownItems = document.querySelectorAll('.filter-location');
    const selectedLocationText = document.getElementById('selectedLocationText');
    const locationInput = document.getElementById('location_input');
    const locationDropdownButton = document.getElementById('locationDropdown');

    // Set initial text for location dropdown based on current query param
    if (locationInput.value) {
        const currentLocationItem = Array.from(locationDropdownItems).find(item => item.dataset.value === locationInput.value);
        if (currentLocationItem && currentLocationItem.dataset.value !== "") {
            selectedLocationText.textContent = `: ${currentLocationItem.textContent}`;
        } else if (currentLocationItem && currentLocationItem.dataset.value === "") {
            selectedLocationText.textContent = "";
        }
    }

    locationDropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const value = this.dataset.value;
            const text = this.textContent;
            locationInput.value = value;
             if (value === "" && (text === "All Province" || text === "All City")) {
                selectedLocationText.textContent = "";
                locationDropdownButton.childNodes[0].nodeValue = "Location ";
            } else {
                selectedLocationText.textContent = `: ${text}`;
                locationDropdownButton.childNodes[0].nodeValue = "Location ";
            }
        });
    });

    // Jika menggunakan lozad.js, pastikan untuk menginisialisasinya
    if (typeof lozad === 'function') {
        const observer = lozad();
        observer.observe();
    }
});
</script>
@endpush

@push('styles')
<style>
    /* Opsi: Tambahkan sedikit style kustom jika diperlukan */
    #selectedMediaText, #selectedLocationText {
        font-size: 0.9em;
        color: #555;
    }
    .dropdown-menu .dropdown-item {
        cursor: pointer;
    }
</style>
@endpush