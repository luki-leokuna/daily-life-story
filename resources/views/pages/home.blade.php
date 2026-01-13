@extends('layouts.main')

@section('title', 'Home - Daily Life Stories')

@section('content')

<div class="container my-5">

    {{-- SEARCH & FILTERS --}}
    <div class="row mb-5">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group input-group-lg">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search stories..." 
                           value="{{ $search }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- CATEGORIES --}}
    <div class="text-center mb-5">
        <a href="{{ route('home') }}" 
           class="btn btn-sm {{ !$categorySlug ? 'btn-primary' : 'btn-outline-secondary' }} me-2">
            All
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('home', ['category' => $cat->slug]) }}" 
               class="btn btn-sm {{ $categorySlug == $cat->slug ? 'btn-primary' : 'btn-outline-secondary' }} me-2">
                {{ $cat->name }} ({{ $cat->stories_count }})
            </a>
        @endforeach
    </div>

    {{-- FEATURED STORY --}}
    @if($featuredStory && !$search && !$categorySlug)
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('images/stories/' . $featuredStory->featured_image) }}" 
                             class="img-fluid" 
                             style="height: 400px; width: 100%; object-fit: cover;"
                             alt="{{ $featuredStory->title }}">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body p-5">
                            <span class="category-badge" style="background: {{ $featuredStory->category->color }}">
                                {{ $featuredStory->category->name }}
                            </span>
                            <h2 class="card-title mt-3">{{ $featuredStory->title }}</h2>
                            <p class="card-text text-muted">{{ $featuredStory->excerpt }}</p>
                            <a href="{{ route('story.show', $featuredStory->slug) }}" class="btn btn-primary">
                                Read More →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- STORIES GRID --}}
    <div class="row">
        @forelse($stories as $story)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                     class="card-img-top" 
                     alt="{{ $story->title }}">
                <div class="card-body">
                    <span class="category-badge" style="background: {{ $story->category->color }}">
                        {{ $story->category->name }}
                    </span>
                    <h5 class="card-title mt-3">{{ $story->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($story->excerpt, 100) }}</p>
                    <a href="{{ route('story.show', $story->slug) }}" class="btn btn-sm btn-outline-primary">
                        Read More →
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">No stories found</h4>
            <p>Try a different search or category</p>
        </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $stories->links() }}
    </div>

</div>

@endsection