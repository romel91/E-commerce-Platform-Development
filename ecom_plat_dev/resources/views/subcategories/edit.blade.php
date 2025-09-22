@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-warning text-white fw-bold rounded-top-4">
                <i class="bi bi-pencil-square"></i> Edit Subcategory
            </div>
            <div class="card-body">
                <form action="{{ route('subcategories.update', $subcategory->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Subcategory Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $subcategory->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Parent Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning w-100">
                        Update Subcategory
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
