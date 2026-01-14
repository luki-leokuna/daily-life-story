@extends('layouts.main')

@section('title', 'About - Daily Life Stories')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- HEADER SECTION --}}
            <div class="text-center mb-5 pb-5">
                <h1 class="display-3 fw-bold mb-4">Tentang <span style="font-family: 'Playfair Display', serif; font-style: italic; color: var(--primary-color);">daily life.</span></h1>
                <div class="mx-auto border-bottom border-2 border-primary" style="width: 50px;"></div>
            </div>

            {{-- CONTENT SECTION --}}
            <div class="row align-items-center mb-5 pb-5">
                <div class="col-md-6 mb-4 mb-md-0">
                    {{-- Ganti source image dengan foto tim/kamu atau foto estetik yang personal --}}
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4 shadow-sm" 
                             alt="Behind the scenes">
                        {{-- Aksen dekoratif --}}
                        <div class="position-absolute bottom-0 start-0 translate-middle-y ms-n3 d-none d-lg-block">
                             <span class="badge bg-white text-dark shadow-sm p-3 rounded-3" style="font-style: italic;">"Capturing the ordinary."</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ps-md-5">
                    <p class="lead fw-bold text-dark mb-4" style="font-family: 'Playfair Display', serif; font-size: 1.5rem;">
                        Ruang di mana setiap detik kecil menjadi sebuah narasi yang bermakna.
                    </p>
                    <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.8;">
                        Selamat datang di <strong>Daily Life Stories</strong>. Kami percaya bahwa cerita tercantik dalam hidup justru ditemukan dalam hal-hal biasa: aroma kopi di pagi hari, percakapan hangat dengan sahabat, hingga kemenangan-kemenangan kecil dalam keseharian.
                    </p>
                    <p class="text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                        Blog ini adalah perayaan untuk kejujuran dan hal-hal yang saling terhubung. Baik kamu di sini untuk inspirasi gaya hidup maupun sekadar pengingat bahwa kamu tidak sendirian di tengah kekacauan hidup yang indah ini.
                    </p>
                </div>
            </div>

            {{-- TOPIC GRID --}}
            <div class="bg-white rounded-4 p-5 shadow-sm mb-5 border-0">
                <h3 class="text-center mb-5" style="font-family: 'Playfair Display', serif;">Apa yang Kami Tulis?</h3>
                <div class="row g-4 text-center">
                    @php
                        $topics = [
                            ['icon' => '🍃', 'title' => 'Lifestyle', 'desc' => 'Rutinitas & keseimbangan.'],
                            ['icon' => '👗', 'title' => 'Fashion', 'desc' => 'Gaya personal & inspirasi.'],
                            ['icon' => '🍳', 'title' => 'Food', 'desc' => 'Resep & petualangan rasa.'],
                            ['icon' => '🧸', 'title' => 'Parenting', 'desc' => 'Suka duka membesarkan anak.'],
                            ['icon' => '✈️', 'title' => 'Travel', 'desc' => 'Cerita dari tempat jauh & dekat.'],
                            ['icon' => '🎨', 'title' => 'Culture', 'desc' => 'Buku, seni, dan inspirasi.']
                        ];
                    @endphp

                    @foreach($topics as $topic)
                    <div class="col-6 col-md-4">
                        <div class="p-3">
                            <div class="fs-1 mb-2">{{ $topic['icon'] }}</div>
                            <h6 class="fw-bold mb-1">{{ $topic['title'] }}</h6>
                            <p class="small text-muted mb-0">{{ $topic['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- CLOSING --}}
            <div class="text-center py-5">
                <p class="mb-5 italic text-muted" style="font-size: 1.2rem; font-style: italic;">
                    "Terima kasih telah menjadi bagian dari perjalanan ini."
                </p>
                <a href="{{ route('home') }}" class="btn-read-more fs-5">
                    Mulai Jelajahi Cerita Kami →
                </a>
                
                <div class="mt-5 pt-4">
                    <p class="mb-0 fw-bold">With love,</p>
                    <p style="font-family: 'Playfair Display', serif; color: var(--primary-color); font-size: 1.2rem;">The Daily Life Stories Team</p>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Tambahan internal untuk halaman About */
    .btn-read-more {
        border-bottom: 2px solid var(--primary-color);
        color: var(--text-main);
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-read-more:hover {
        padding-left: 15px;
        color: var(--primary-color);
    }
</style>

@endsection