@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-info text-white fw-bold rounded-top-4">
                <i class="bi bi-box"></i> Product Details
            </div>
            <div class="card-body">
                <h4 class="fw-bold">{{ $product->name }}</h4>
                <p class="text-muted">{{ $product->slug }}</p>

                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded mb-3" style="max-height: 300px;">
                @endif

                <p><strong>Category:</strong> {{ $product->category->name }}</p>
                <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>

                <p>
                    <span class="text-decoration-line-through text-danger me-2">{{ $product->old_price }} ৳</span>
                    <span class="fw-bold text-success">{{ $product->new_price }} ৳</span>
                </p>

                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
