<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Seed initial categories and products when none exist in the session.
     */
    private function seed(): void
    {
        if (!session()->has('categories')) {
            session(['categories' => ['Elektronik', 'Pakaian', 'Makanan']]);
        }

        if (!session()->has('products')) {
            $categories = session('categories');
            $products = [];
            foreach ($categories as $cIndex => $category) {
                for ($i = 1; $i <= 10; $i++) {
                    $products[] = [
                        'name' => "$category $i",
                        'description' => "Deskripsi $category $i",
                        'price' => rand(10000, 100000),
                        'category' => $category,
                        'date' => now()->format('Y-m-d H:i:s'),
                    ];
                }
            }
            session(['products' => $products]);
        }
    }
    public function index(Request $request)
    {
        $this->seed();
        $products = session('products', []);

        if ($request->filled('q')) {
            $keyword = strtolower($request->q);
            $products = array_filter($products, function ($p) use ($keyword) {
                return str_contains(strtolower($p['name']), $keyword) ||
                    str_contains(strtolower($p['description']), $keyword);
            });
        }

        if ($request->filled('min_price')) {
            $min = (int) $request->min_price;
            $products = array_filter($products, fn ($p) => $p['price'] >= $min);
        }

        if ($request->filled('max_price')) {
            $max = (int) $request->max_price;
            $products = array_filter($products, fn ($p) => $p['price'] <= $max);
        }

        if ($request->sort === 'name') {
            usort($products, fn ($a, $b) => strcmp($a['name'], $b['name']));
        } elseif ($request->sort === 'price') {
            usort($products, fn ($a, $b) => $a['price'] <=> $b['price']);
        }

        return view('products.list', [
            'products' => $products,
            'request' => $request,
        ]);
    }

    public function create()
    {
        $this->seed();
        $categories = session('categories', []);
        return view('products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);

        $products = session('products', []);
        $products[] = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'date' => now()->format('Y-m-d H:i:s'),
        ];
        session(['products' => $products]);
        session()->flash('success', 'Produk berhasil ditambahkan.');
        return redirect()->route('products.index');
        

    }

    public function edit($id)
    {
        $this->seed();
        $products = session('products', []);
        $product = $products[$id];
        $categories = session('categories', []);
        return view('products.form', compact('product', 'id', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);

        $products = session('products', []);
        $products[$id] = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'date' => now()->format('Y-m-d H:i:s'),
        ];
        session(['products' => $products]);
        session()->flash('success', 'Produk berhasil diperbarui.');

        return redirect()->route('products.index');
        
    }

    public function show($id)
    {
        $this->seed();
        $products = session('products', []);
        $product = $products[$id];
        return view('products.show', compact('product'));
    }

    public function destroy($id) {
    $products = session()->get('products', []);
    unset($products[$id]);
    $products = array_values($products); // reset index
    session(['products' => $products]);
    session()->flash('success', 'Produk berhasil dihapus.');
    return redirect()->route('products.index');
    }

}
