<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// CATEGORY ROUTES (Slug-based)
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{slug}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// SUBCATEGORY ROUTES (Slug-based)
Route::get('subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::get('subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
Route::post('subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
Route::get('subcategories/{slug}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('subcategories/{slug}', [SubcategoryController::class, 'update'])->name('subcategories.update');
Route::delete('subcategories/{slug}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');

// PRODUCT ROUTES (Slug-based)
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show.slug');
Route::get('products/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{slug}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{slug}', [ProductController::class, 'destroy'])->name('products.destroy');
