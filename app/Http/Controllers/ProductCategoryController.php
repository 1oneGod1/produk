<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.form', [
            'action' => route('categories.store'),
            'method' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:product_categories,name',
        ]);

        ProductCategory::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('categories.form', [
            'category' => $category,
            'action' => route('categories.update', $id),
            'method' => 'POST',
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:product_categories,name,' . $id,
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
