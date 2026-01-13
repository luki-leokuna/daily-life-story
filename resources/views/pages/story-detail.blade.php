@extends('layouts.main')

@section('title', $story->title . ' - Daily Life Stories')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- CATEGORY & TITLE --}}
            <span class="category-badge mb-3 d-inline-block" style="background: {{ $story->category->color }}">
                {{ $story->category->name }}
            </span>

            <h1 class="display-4 fw-bold mb-3">{{ $story->title }}</h1>

            <div class="d-flex text-muted mb-4">
                <span class="me-4">📅 {{ $story->created_at->format('F d, Y') }}</span>
                <span>👁️ {{ $story->views }} views</span>
            </div>

            {{-- FEATURED IMAGE --}}
            <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                 class="img-fluid rounded shadow-lg mb-5" 
                 alt="{{ $story->title }}">

            {{-- EXCERPT --}}
            <p class="lead" style="font-size: 1.25rem; line-height: 1.8;">
                {{ $story->excerpt }}
            </p>

            <hr class="my-5">

            {{-- CONTENT --}}
            <div class="story-content" style="font-size: 1.1rem; line-height: 1.9;">
                {!! nl2br(e($story->content)) !!}
            </div>

            {{-- TAGS --}}
            @if($story->tags->count() > 0)
            <div class="mt-5">
                <h6 class="text-muted mb-3">Tags:</h6>
                @foreach($story->tags as $tag)
                    <span class="badge bg-secondary me-2">#{{ $tag->tag }}</span>
                @endforeach
            </div>
            @endif

            {{-- SHARE --}}
            <div class="border-top border-bottom py-4 my-5">
                <p class="mb-2 fw-bold">Share this story:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                   target="_blank" 
                   class="btn btn-sm btn-primary me-2">
                    Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $story->title }}" 
                   target="_blank" 
                   class="btn btn-sm btn-info me-2">
                    Twitter
                </a>
                <a href="https://wa.me/?text={{ $story->title }} {{ url()->current() }}" 
                   target="_blank" 
                   class="btn btn-sm btn-success">
                    WhatsApp
                </a>
            </div>

            {{-- BACK BUTTON --}}
            <div class="mb-5">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    ← Back to Home
                </a>
            </div>

        </div>
    </div>

    {{-- RELATED STORIES --}}
    @if($relatedStories->count() > 0)
    <div class="border-top pt-5 mt-5">
        <h3 class="text-center mb-4">Related Stories</h3>
        <div class="row">
            @foreach($relatedStories as $related)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/stories/' . $related->featured_image) }}" 
                         class="card-img-top" 
                         alt="{{ $related->title }}">
                    <div class="card-body">
                        <span class="category-badge" style="background: {{ $related->category->color }}">
                            {{ $related->category->name }}
                        </span>
                        <h5 class="card-title mt-3">{{ $related->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($related->excerpt, 80) }}</p>
                        <a href="{{ route('story.show', $related->slug) }}" class="btn btn-sm btn-outline-primary">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection