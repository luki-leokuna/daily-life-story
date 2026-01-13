@extends('layouts.main')

@section('title', 'Create New Story')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">✏️ Create New Story</h4>
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

                    <form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" 
                                   value="{{ old('title') }}" required 
                                   placeholder="A Morning Routine That Changed My Life">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Excerpt (Short Summary) <span class="text-danger">*</span></label>
                            <textarea name="excerpt" class="form-control" rows="3" required 
                                      placeholder="A brief summary of your story (1-2 sentences)">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="10" required 
                                      placeholder="Write your full story here...">{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Featured Image <span class="text-danger">*</span></label>
                            <input type="file" name="featured_image" class="form-control" 
                                   accept="image/*" required onchange="previewImage(event)">
                            <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                            
                            <div class="mt-3">
                                <img id="preview" class="img-thumbnail" style="max-height: 200px; display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tags (Optional)</label>
                            <input type="text" name="tags" class="form-control" 
                                   value="{{ old('tags') }}" 
                                   placeholder="morning, routine, self-care (separated by commas)">
                            <small class="text-muted">Separate tags with commas</small>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_featured" class="form-check-input" 
                                   id="isFeatured" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="isFeatured">
                                ⭐ Mark as Featured Story
                            </label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">
                                ← Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                💾 Publish Story
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