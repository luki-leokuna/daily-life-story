@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">✏️ Edit Category</h4>
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

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" 
                                   value="{{ old('name', $category->name) }}" required>
                            <small class="text-muted">Current slug: <code>{{ $category->slug }}</code></small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Color <span class="text-danger">*</span></label>
                            <input type="color" name="color" class="form-control form-control-color" 
                                   value="{{ old('color', $category->color) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Preview</label>
                            <div>
                                <span class="badge" id="colorPreview" 
                                      style="background: {{ $category->color }}; font-size: 1rem; padding: 0.5rem 1rem;">
                                    {{ $category->name }}
                                </span>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <strong>📊 Statistics:</strong> This category has {{ $category->stories->count() }} stories
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                ← Cancel
                            </a>
                            <button type="submit" class="btn btn-warning">
                                💾 Update Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview
const colorInput = document.querySelector('input[name="color"]');
const nameInput = document.querySelector('input[name="name"]');
const preview = document.getElementById('colorPreview');

colorInput.addEventListener('input', function(e) {
    preview.style.background = e.target.value;
});

nameInput.addEventListener('input', function(e) {
    preview.textContent = e.target.value || 'Category Name';
});
</script>

@endsection