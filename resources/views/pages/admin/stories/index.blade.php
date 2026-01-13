@extends('layouts.main')

@section('title', 'Admin - Manage Stories')

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manage Stories</h2>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">
                📁 Categories
            </a>
            <a href="{{ route('admin.stories.create') }}" class="btn btn-primary">
                ✏️ New Story
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">Image</th>
                    <th width="25%">Title</th>
                    <th width="10%">Category</th>
                    <th width="10%">Views</th>
                    <th width="10%">Featured</th>
                    <th width="10%">Date</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stories as $story)
                <tr>
                    <td>{{ $story->id }}</td>
                    <td>
                        <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                             alt="{{ $story->title }}" 
                             class="img-thumbnail"
                             style="width: 100px; height: 70px; object-fit: cover;">
                    </td>
                    <td>
                        <strong>{{ $story->title }}</strong>
                        <br>
                        <small class="text-muted">{{ Str::limit($story->excerpt, 60) }}</small>
                    </td>
                    <td>
                        <span class="badge" style="background: {{ $story->category->color }}">
                            {{ $story->category->name }}
                        </span>
                    </td>
                    <td>{{ $story->views }}</td>
                    <td>
                        @if($story->is_featured)
                            <span class="badge bg-warning">⭐ Featured</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td>{{ $story->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="btn-group-vertical" role="group">
                            <a href="{{ route('story.show', $story->slug) }}" 
                               class="btn btn-sm btn-info mb-1" 
                               target="_blank">
                                👁️ View
                            </a>
                            <a href="{{ route('admin.stories.edit', $story->id) }}" 
                               class="btn btn-sm btn-warning mb-1">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.stories.destroy', $story->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Delete this story?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No stories yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Home</a>
    </div>

</div>

@endsection