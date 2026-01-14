@extends('layouts.main')

@section('title', 'Home - Daily Life Stories')

@section('content')

<div class="container">

    {{-- SEARCH SECTION --}}
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
            @if($search)
                <p class="small text-muted mt-3">Menampilkan hasil untuk: <strong>"{{ $search }}"</strong> <a href="{{ route('home') }}" class="text-danger ms-2 text-decoration-none">× Hapus</a></p>
            @endif
        </div>
    </div>

    {{-- CATEGORIES --}}
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

    {{-- FEATURED STORY --}}
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

            {{-- Info Penulis di Featured --}}
            <div class="d-flex align-items-center mb-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($featuredStory->user->name ?? 'Anonim') }}&background=random&size=32" class="rounded-circle me-2">
                <small class="text-muted">Oleh
                    @if($featuredStory->user)
                        <a href="{{ route('profile.show', $featuredStory->user->name) }}" class="text-dark fw-bold text-decoration-none">
                            {{ $featuredStory->user->name }}
                        </a>
                    @else
                        <span class="fw-bold">Penulis Anonim</span>
                    @endif
                </small>
            </div>

            <p class="text-muted mb-4 fs-5">{{ $featuredStory->excerpt }}</p>
            <a href="{{ route('story.show', $featuredStory->slug) }}" class="btn-read-more text-decoration-none">
                Baca Selengkapnya
            </a>
        </div>
    </div>
    @endif

    {{-- STORIES GRID --}}
    <div class="row g-5">
        @forelse($stories as $story)
        <div class="col-md-4">
            <article class="card h-100 border-0 bg-transparent d-flex flex-column">
                {{-- Foto --}}
                <a href="{{ route('story.show', $story->slug) }}" class="overflow-hidden rounded-4 mb-3 d-block shadow-sm">
                    <img src="{{ asset('images/stories/' . $story->featured_image) }}"
                        class="card-img-top w-100 transition-image"
                        alt="{{ $story->title }}"
                        style="aspect-ratio: 4/3; object-fit: cover;">
                </a>

                <div class="card-body px-0 pt-2 d-flex flex-column flex-grow-1">
                    {{-- Kategori & Stats --}}
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="category-badge"
                            style="color: {{ $story->category->color }}; border-color: {{ $story->category->color }}; font-size: 0.65rem;">
                            {{ $story->category->name }}
                        </span>
                        <div class="small text-muted" style="font-size: 0.7rem;">
                            <i class="bi bi-heart-fill text-danger"></i> {{ $story->likes->count() }}
                            <i class="bi bi-chat-left-text ms-2"></i> {{ $story->comments->count() }}
                        </div>
                    </div>

                    {{-- Judul --}}
                    <h5 class="card-title fw-bold mb-2">
                        <a href="{{ route('story.show', $story->slug) }}"
                        class="text-decoration-none text-dark line-clamp-2"
                        style="min-height: 3rem; line-height: 1.4;">
                            {{ $story->title }}
                        </a>
                    </h5>

                   {{-- Info Penulis di GRID  --}}
                    <div class="d-flex align-items-center mb-3">
                        <small class="text-muted">
                            Oleh
                            @if($story->user)
                                <a href="{{ route('profile.show', $story->user->name) }}" class="text-decoration-none fw-bold text-dark">
                                    {{ $story->user->name }}
                                </a>
                            @else
                                <span class="fw-bold">Penulis Anonim</span>
                            @endif
                        </small>
                    </div>

                    {{-- Excerpt --}}
                    <p class="card-text text-muted small line-clamp-3 mb-4">
                        {{ Str::limit($story->excerpt, 90) }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('story.show', $story->slug) }}" class="btn-read-more text-decoration-none">
                            Lanjut Membaca
                        </a>
                    </div>
                </div>
            </article>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Tidak ada cerita yang ditemukan.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($stories->hasPages())
    <div class="d-flex justify-content-center mt-5 mb-5">
        {{ $stories->appends(['search' => $search, 'category' => $categorySlug])->links() }}
    </div>
    @endif
</div>

<style>
    .transition-image {
        transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .transition-image:hover {
        transform: scale(1.05);
    }
    .tracking-widest {
        letter-spacing: 0.15em;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .btn-read-more {
        font-size: 0.8rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #000;
        border-bottom: 2px solid #000;
        padding-bottom: 2px;
        transition: all 0.3s;
    }
    .btn-read-more:hover {
        color: #666;
        border-color: #666;
    }
</style>

@endsection
