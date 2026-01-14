@extends('layouts.main')

@section('title', 'Home - Daily Life Stories')

@section('content')

<div class="container">

    {{-- SEARCH SECTION: Dibuat lebih minimalis --}}
    <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
            <form action="{{ route('home') }}" method="GET" class="position-relative">
                <input type="text" name="search" 
                       class="form-control border-0 bg-white shadow-sm rounded-pill px-4 py-3" 
                       placeholder="Cari cerita hari ini..." 
                       value="{{ $search }}"
                       style="font-style: italic;">
                <button class="btn position-absolute end-0 top-0 mt-1 me-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{-- CATEGORIES: Berubah dari tombol menjadi link teks estetik --}}
    <div class="text-center mb-5 pb-4 border-bottom">
        <a href="{{ route('home') }}" 
           class="text-decoration-none mx-3 {{ !$categorySlug ? 'fw-bold text-dark border-bottom border-2 border-primary' : 'text-muted' }} small text-uppercase tracking-widest">
            Semua Cerita
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('home', ['category' => $cat->slug]) }}" 
               class="text-decoration-none mx-3 {{ $categorySlug == $cat->slug ? 'fw-bold text-dark border-bottom border-2 border-primary' : 'text-muted' }} small text-uppercase tracking-widest">
                {{ $cat->name }} <span class="opacity-50">({{ $cat->stories_count }})</span>
            </a>
        @endforeach
    </div>

    {{-- FEATURED STORY: Layout Majalah (Hero) --}}
    @if($featuredStory && !$search && !$categorySlug)
    <div class="row align-items-center mb-5 pb-5">
        <div class="col-lg-7 px-0 px-lg-3">
            <div class="overflow-hidden rounded-4 shadow-sm">
                <img src="{{ asset('images/stories/' . $featuredStory->featured_image) }}" 
                     class="img-fluid w-100 transition-image" 
                     style="height: 500px; object-fit: cover;"
                     alt="{{ $featuredStory->title }}">
            </div>
        </div>
        <div class="col-lg-5 p-5">
            <span class="category-badge mb-3 d-inline-block" style="color: {{ $featuredStory->category->color }}">
                {{ $featuredStory->category->name }}
            </span>
            <h1 class="display-5 mb-3">{{ $featuredStory->title }}</h1>
            <p class="text-muted mb-4 fs-5">{{ $featuredStory->excerpt }}</p>
            <a href="{{ route('story.show', $featuredStory->slug) }}" class="btn-read-more">
                Baca Selengkapnya
            </a>
        </div>
    </div>
    @endif
    {{-- STORIES GRID --}}
    <div class="row g-5">
        @forelse($stories as $story)
        <div class="col-md-4">
            {{-- Menambahkan h-100 dan flex agar isi card sejajar --}}
            <article class="card h-100 border-0 bg-transparent d-flex flex-column">
                {{-- Foto dengan Aspect Ratio Konsisten (1:1 atau 4:3) --}}
                <a href="{{ route('story.show', $story->slug) }}" class="overflow-hidden rounded-4 mb-3 d-block shadow-sm">
                    <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                        class="card-img-top w-100" 
                        alt="{{ $story->title }}"
                        style="aspect-ratio: 4/3; object-fit: cover;">
                </a>

                <div class="card-body px-0 pt-2 d-flex flex-column flex-grow-1">
                    {{-- Kategori dengan badge yang lebih soft --}}
                    <div>
                        <span class="category-badge mb-2 d-inline-block" 
                            style="color: {{ $story->category->color }}; border-color: {{ $story->category->color }}; font-size: 0.65rem;">
                            {{ $story->category->name }}
                        </span>
                    </div>

                    {{-- Judul: Membatasi baris agar seragam --}}
                    <h5 class="card-title fw-bold mb-2">
                        <a href="{{ route('story.show', $story->slug) }}" 
                        class="text-decoration-none text-dark line-clamp-2" 
                        style="min-height: 3rem; line-height: 1.4;">
                            {{ $story->title }}
                        </a>
                    </h5>

                    {{-- Excerpt: Memberi jarak yang konsisten --}}
                    <p class="card-text text-muted small line-clamp-3 mb-4">
                        {{ Str::limit($story->excerpt, 90) }}
                    </p>

                    {{-- Tombol: Dipaksa ke bawah menggunakan mt-auto --}}
                    <div class="mt-auto">
                        <a href="{{ route('story.show', $story->slug) }}" class="btn-read-more">
                            Lanjut Membaca
                        </a>
                    </div>
                </div>
            </article>
        </div>
        @empty
        {{-- Empty state tetap sama --}}
        @endforelse
    </div>
    {{-- PAGINATION: Custom styling --}}
    <div class="d-flex justify-content-center mt-5 pt-5">
        {{ $stories->links() }}
    </div>

</div>

<style>
    /* Tambahan internal CSS khusus untuk halaman ini */
    .transition-image {
        transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .transition-image:hover {
        transform: scale(1.05);
    }
    .tracking-widest {
        letter-spacing: 0.15em;
    }
    /* Menyesuaikan pagination Laravel agar lebih cantik dengan Bootstrap 5 */
    .pagination .page-link {
        border: none;
        color: var(--text-muted);
        background: transparent;
        margin: 0 5px;
    }
    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-radius: 50%;
        color: white;
    }
</style>

@endsection