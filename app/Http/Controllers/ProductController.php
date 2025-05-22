<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = session()->get('products', []);
        return view('products.list', compact('products'));
    }

    public function create() {
        return view('products.form');
    }

    public function store(Request $request) {
        $request->validate([
    'name' => 'required|string|min:3',
    'description' => 'required|string',
    'price' => 'required|numeric|min:0'
]);

        $products = session()->get('products', []);
        $products[] = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'date' => now()->format('Y-m-d H:i:s')
        ];
        session(['products' => $products]);
        session()->flash('success', 'Produk berhasil ditambahkan.');
        return redirect()->route('products.index');
        

    }

    public function edit($id) {
        $products = session()->get('products', []);
        $product = $products[$id];
        return view('products.form', compact('product', 'id'));
    }

    public function update(Request $request, $id) {
        $request->validate([
    'name' => 'required|string|min:3',
    'description' => 'required|string',
    'price' => 'required|numeric|min:0'
]);

        $products = session()->get('products', []);
        $products[$id] = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'date' => now()->format('Y-m-d H:i:s')
        ];
        session(['products' => $products]);
        session()->flash('success', 'Produk berhasil diperbarui.');

        return redirect()->route('products.index');
        
    }

    public function show($id) {
        $products = session()->get('products', []);
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
