@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Subcategories</h2>
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle"></i> Add Subcategory
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subcategories as $index => $subcategory)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-semibold">{{ $subcategory->name }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $subcategory->slug }}</span>
                    </td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('subcategories.edit', $subcategory->slug) }}"
                           class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('subcategories.destroy', $subcategory->slug) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No subcategories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
