@extends('layouts.main')

@section('title', 'Edit Story')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">✏️ Edit Story</h4>
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.stories.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" 
                                   value="{{ old('title', $story->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id', $story->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Excerpt <span class="text-danger">*</span></label>
                            <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $story->excerpt) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="10" required>{{ old('content', $story->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('images/stories/' . $story->featured_image) }}" 
                                     alt="{{ $story->title }}" 
                                     class="img-thumbnail"
                                     style="max-height: 200px;">
                            </div>
                            
                            <label class="form-label fw-bold">Change Image (Optional)</label>
                            <input type="file" name="featured_image" class="form-control" 
                                   accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Leave empty to keep current image</small>
                            
                            <div class="mt-3">
                                <img id="preview" class="img-thumbnail" style="max-height: 200px; display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tags (Optional)</label>
                            <input type="text" name="tags" class="form-control" 
                                   value="{{ old('tags', $story->tags->pluck('tag')->implode(', ')) }}" 
                                   placeholder="morning, routine, self-care">
                            <small class="text-muted">Separate tags with commas</small>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_featured" class="form-check-input" 
                                   id="isFeatured" {{ old('is_featured', $story->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="isFeatured">
                                ⭐ Mark as Featured Story
                            </label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">
                                ← Cancel
                            </a>
                            <button type="submit" class="btn btn-warning">
                                💾 Update Story
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>

@endsection