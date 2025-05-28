@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Selamat datang di Web Pariwisata Jogja</h1>
        <img src="{{ asset('images/jogja-malioboro.jpg') }}" class="img-fluid rounded" alt="Malioboro">
        <p>Temukan destinasi wisata terbaik, kuliner yang menggugah selera, dan berita terkini di Jogja!</p>

        <!-- Highlights Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/vredeburg.jpg') }}" class="card-img-top" alt="Vredeburg">
                    <div class="card-body">
                        <h5 class="card-title">Highlight 1</h5>
                        <p class="card-text">Deskripsi</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/malioboro.jpg') }}" class="card-img-top" alt="Malioboro">
                    <div class="card-body">
                        <h5 class="card-title">Highlight 2</h5>
                        <p class="card-text">Deskripsi</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/keraton.jpg') }}" class="card-img-top" alt="Keraton">
                    <div class="card-body">
                        <h5 class="card-title">Highlight 3</h5>
                        <p class="card-text">Deskripsi</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/tugu.jpg') }}" class="card-img-top" alt="Tugu">
                    <div class="card-body">
                        <h5 class="card-title">Highlight 4</h5>
                        <p class="card-text">Deskripsi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
