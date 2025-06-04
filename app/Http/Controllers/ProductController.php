<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controller yang menangani logika CRUD produk
class ProductController extends Controller
{
    /**
     * Mengisi data awal kategori dan produk jika belum ada di sesi.
     */
    private function seed(): void
    {
        // Isi default kategori jika belum tersimpan di sesi
        if (!session()->has('categories')) {
            session(['categories' => ['Elektronik', 'Pakaian', 'Makanan']]);
        }

        // Jika belum ada produk, buat dummy produk per kategori
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
    // Menampilkan daftar produk dengan filter dan sorting
    public function index(Request $request)
    {
        // Pastikan data awal sudah ada
        $this->seed();
        // Ambil produk dari sesi
        $products = session('products', []);

        // Filter berdasarkan kata kunci pencarian
        if ($request->filled('q')) {
            $keyword = strtolower($request->q);
            $products = array_filter($products, function ($p) use ($keyword) {
                return str_contains(strtolower($p['name']), $keyword) ||
                    str_contains(strtolower($p['description']), $keyword);
            });
        }

        // Filter harga minimum
        if ($request->filled('min_price')) {
            $min = (int) $request->min_price;
            $products = array_filter($products, fn ($p) => $p['price'] >= $min);
        }

        // Filter harga maksimum
        if ($request->filled('max_price')) {
            $max = (int) $request->max_price;
            $products = array_filter($products, fn ($p) => $p['price'] <= $max);
        }

        // Sorting daftar produk
        if ($request->sort === 'name') {
            usort($products, fn ($a, $b) => strcmp($a['name'], $b['name']));
        } elseif ($request->sort === 'price') {
            usort($products, fn ($a, $b) => $a['price'] <=> $b['price']);
        }

        // Tampilkan view dengan data produk
        return view('products.list', [
            'products' => $products,
            'request' => $request,
        ]);
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $this->seed();
        $categories = session('categories', []);
        return view('products.form', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
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

    // Menampilkan form edit produk
    public function edit($id)
    {
        $this->seed();
        $products = session('products', []);
        $product = $products[$id];
        $categories = session('categories', []);
        return view('products.form', compact('product', 'id', 'categories'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        // Validasi input
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

    // Menampilkan detail produk
    public function show($id)
    {
        $this->seed();
        $products = session('products', []);
        $product = $products[$id];
        return view('products.show', compact('product'));
    }

    // Menghapus produk dari sesi
    public function destroy($id) {
        $products = session()->get('products', []);
        unset($products[$id]);
        $products = array_values($products); // reset index
        session(['products' => $products]);
        session()->flash('success', 'Produk berhasil dihapus.');
        return redirect()->route('products.index');
    }

}
