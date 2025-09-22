<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index() {
        $subcategories = Subcategory::with('category')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create() {
        $categories = Category::all(); // dropdown for parent category
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id'
        ]);

        Subcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')
                         ->with('success', 'Subcategory created successfully.');
    }

    public function edit($slug) {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $slug) {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id'
        ]);

        $subcategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')
                         ->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($slug) {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $subcategory->delete();

        return redirect()->route('subcategories.index')
                         ->with('success', 'Subcategory deleted successfully.');
    }
}
