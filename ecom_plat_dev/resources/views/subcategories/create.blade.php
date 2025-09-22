@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Add Subcategory</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Subcategory Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
