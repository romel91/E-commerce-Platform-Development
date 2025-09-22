<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('products')->get();
        return view('products.index', compact('subcategories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'nullable|string',
            'old_price'     => 'nullable|numeric',
            'new_price'     => 'required|numeric',
            'category_id'   => 'required|exists:categories,id',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'          => $request->name,
            'title'         => $request->name,
            'slug'          => Str::slug($request->name),
            'description'   => $request->description,
            'old_price'     => $request->old_price,
            'new_price'     => $request->new_price,
            'category_id'   => $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'image'         => $path
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'          => 'required',
            'description'   => 'nullable|string',
            'old_price'     => 'nullable|numeric',
            'new_price'     => 'required|numeric',
            'category_id'   => 'required|exists:categories,id',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $product->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'description'   => $request->description,
            'old_price'     => $request->old_price,
            'new_price'     => $request->new_price,
            'category_id'   => $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'image'         => $path
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
