@extends('layouts.main')

@section('title', 'Story Details')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">📖 Story Details</h4>
                </div>
                <div class="card-body">

                    {{-- FEATURED IMAGE --}}
                    <div class="mb-4">
                        <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                             alt="{{ $story->title }}" 
                             class="img-fluid rounded">
                    </div>

                    {{-- DETAILS TABLE --}}
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $story->id }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><strong>{{ $story->title }}</strong></td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td><code>{{ $story->slug }}</code></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>
                                <span class="badge" style="background: {{ $story->category->color }}">
                                    {{ $story->category->name }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Excerpt</th>
                            <td>{{ $story->excerpt }}</td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td style="white-space: pre-wrap;">{{ $story->content }}</td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                @if($story->tags->count() > 0)
                                    @foreach($story->tags as $tag)
                                        <span class="badge bg-secondary me-1">#{{ $tag->tag }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No tags</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Featured Story</th>
                            <td>
                                @if($story->is_featured)
                                    <span class="badge bg-warning">⭐ Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Views</th>
                            <td>{{ $story->views }}</td>
                        </tr>
                        <tr>
                            <th>Image File</th>
                            <td><code>{{ $story->featured_image }}</code></td>
                        </tr>
                        <tr>
                            <th>Created</th>
                            <td>{{ $story->created_at->format('d F Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $story->updated_at->format('d F Y H:i') }}</td>
                        </tr>
                    </table>

                    {{-- ACTIONS --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">
                            ← Back to Stories
                        </a>
                        <div>
                            <a href="{{ route('story.show', $story->slug) }}" 
                               class="btn btn-info me-2" 
                               target="_blank">
                                👁️ View Public
                            </a>
                            <a href="{{ route('admin.stories.edit', $story->id) }}" 
                               class="btn btn-warning me-2">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.stories.destroy', $story->id) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this story?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection