@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-warning text-white fw-bold rounded-top-4">
                <i class="bi bi-pencil-square"></i> Edit Product
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subcategory</label>
                        <select name="subcategory_id" class="form-control">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subcategory_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Old Price</label>
                        <input type="number" name="old_price" class="form-control" value="{{ $product->old_price }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Price</label>
                        <input type="number" name="new_price" class="form-control" value="{{ $product->new_price }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="mt-2" height="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
