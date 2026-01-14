@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <div class="mb-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=128"
                 class="rounded-circle shadow-sm" alt="{{ $user->name }}">
        </div>
        <h2 class="fw-bold">{{ $user->name }}</h2>
        <p class="text-muted">Bergabung sejak {{ $user->created_at->format('M Y') }}</p>
        <div class="badge bg-light text-dark border px-3 py-2 rounded-pill">
            {{ $user->stories->count() }} Cerita Berbagi
        </div>
    </div>

    <hr class="my-5 opacity-25">

    <h4 class="mb-4 fw-light text-center italic">Koleksi Cerita</h4>

    <div class="row g-4">
        @forelse($stories as $story)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ asset('images/stories/' . $story->featured_image) }}" class="card-img-top" alt="{{ $story->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            <a href="{{ route('stories.show', $story->slug) }}" class="text-dark text-decoration-none">{{ $story->title }}</a>
                        </h5>
                        <p class="text-muted small">{{ Str::limit($story->excerpt, 100) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted italic">Belum ada cerita yang dibagikan.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $stories->links() }}
    </div>
</div>
@endsection
