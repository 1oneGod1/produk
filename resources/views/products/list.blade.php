<x-template>
    <!-- Form untuk filter produk -->
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <!-- Dropdown untuk kategori produk -->
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <!-- Input untuk harga minimum -->
            <input type="number" name="min_price" value="{{ request('min_price') }}" class="form-control" placeholder="Min Price">
        </div>
        <div class="col-md-3">
            <!-- Input untuk harga maksimum -->
            <input type="number" name="max_price" value="{{ request('max_price') }}" class="form-control" placeholder="Max Price">
        </div>
        <div class="col-md-3">
            <!-- Tombol untuk menerapkan filter -->
            <button class="btn btn-dark w-100">Filter</button>
        </div>
    </form>

    <!-- Tombol untuk menambahkan kategori dan produk baru -->
    <div class="text-end mb-3">
        <!-- Tombol untuk menambahkan kategori -->
        <a href="{{ route('categories.create') }}" class="btn btn-warning me-2">Add Category</a>
        <!-- Tombol untuk menambahkan produk -->
        <a href="{{ route('products.create') }}" class="btn btn-success">Add new product</a>
    </div>

    <!-- Daftar produk -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        @if($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" class="img-fluid mb-2" style="max-height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif
                        <!-- Menampilkan nama produk -->
                        <h5 class="card-title">{{ $product->name }}</h5>
                        
                        <!-- Menampilkan deskripsi produk dengan batas karakter -->
                        <p class="text-muted">{{ Str::limit($product->description, 60) }}</p>
                        
                        <!-- Menampilkan harga produk dalam format Rupiah -->
                        <p class="fw-bold text-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <!-- Tombol Edit -->
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <!-- Tombol Delete -->
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No products found.</p>
        @endforelse
    </div>
</x-template>
