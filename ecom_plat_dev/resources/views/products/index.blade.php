@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Product
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@foreach($subcategories as $subcategory)
    <div class="mb-5">
        <h4 class="mb-3">{{ $subcategory->name }}
            <small class="text-muted">(Category: {{ $subcategory->category->name }})</small>
        </h4>

        @if($subcategory->products->count() > 0)
            <div class="row">
                @foreach($subcategory->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="card-img-top rounded-top-3"
                                     alt="{{ $product->name }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image"
                                     class="card-img-top rounded-top-3"
                                     alt="No image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($product->description, 60) }}</p>
                                <p class="fw-bold">Price: ${{ $product->price }}</p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between">
                                <a href="{{ route('products.show.slug', $product->slug) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No products found in this subcategory.</p>
        @endif
    </div>
@endforeach
@endsection
