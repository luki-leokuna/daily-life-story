@extends('layouts.main')

@section('title', 'Create New Category')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">➕ Create New Category</h4>
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

                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" 
                                   value="{{ old('name') }}" required 
                                   placeholder="e.g., Lifestyle, Fashion, Travel">
                            <small class="text-muted">Slug will be auto-generated</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Color <span class="text-danger">*</span></label>
                            <input type="color" name="color" class="form-control form-control-color" 
                                   value="{{ old('color', '#3B82F6') }}" required>
                            <small class="text-muted">Choose a color for this category badge</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Preview</label>
                            <div>
                                <span class="badge" id="colorPreview" style="background: #3B82F6; font-size: 1rem; padding: 0.5rem 1rem;">
                                    Category Badge Preview
                                </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                ← Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                💾 Create Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview color
document.querySelector('input[name="color"]').addEventListener('input', function(e) {
    document.getElementById('colorPreview').style.background = e.target.value;
});
</script>

@endsection