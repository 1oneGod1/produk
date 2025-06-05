<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk dengan filter dan pengurutan.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter produk berdasarkan nama atau deskripsi
        if ($request->q) {
            $query->where('name', 'like', "%{$request->q}%")
                  ->orWhere('description', 'like', "%{$request->q}%");
        }

        // Filter berdasarkan harga minimum
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filter berdasarkan harga maksimum
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Pengurutan produk
        if ($request->sort) {
            $query->orderBy($request->sort, $request->input('order', 'asc'));
        }

        $products = $query->take(20)->get(); // Ambil maksimal 20 produk
        $categories = ProductCategory::orderBy('name')->get(); // Ambil semua kategori produk

        return view('products.list', compact('products', 'categories')); // Kirim data produk dan kategori ke view
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get(); // Ambil kategori produk
        return view('products.form', [
            'categories' => $categories,
            'action' => route('products.store'),
            'method' => 'POST',
        ]);
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_category_id' => 'required|exists:product_categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Menampilkan form untuk mengedit produk berdasarkan ID.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::orderBy('name')->get();
        return view('products.form', [
            'product' => $product,
            'categories' => $categories,
            'action' => route('products.update', $id),
            'method' => 'POST',
        ]);
    }

    /**
     * Memperbarui produk berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_category_id' => 'required|exists:product_categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Menghapus produk berdasarkan ID.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Menampilkan detail produk berdasarkan ID.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}

