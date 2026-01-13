@extends('layouts.main')

@section('title', 'Admin - Manage Categories')

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manage Categories</h2>
        <div>
            <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary me-2">
                📝 Stories
            </a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                ➕ New Category
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header text-white" style="background: {{ $category->color }}">
                    <h5 class="mb-0">{{ $category->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Slug:</strong> <code>{{ $category->slug }}</code>
                    </p>
                    <p class="mb-2">
                        <strong>Color:</strong> 
                        <span class="badge" style="background: {{ $category->color }}">
                            {{ $category->color }}
                        </span>
                    </p>
                    <p class="mb-0">
                        <strong>Stories:</strong> {{ $category->stories_count }}
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                           class="btn btn-sm btn-warning">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Delete this category? All related stories will also be deleted!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">No categories yet</h4>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">← Back to Stories</a>
    </div>

</div>

@endsection