<x-template>
    <!-- Menampilkan foto produk -->
    @if($product->photo)
        <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" class="img-fluid mb-3">
    @endif
    
    <!-- Menampilkan nama produk -->
    <h2>{{ $product->name }}</h2>
    
    <!-- Menampilkan kategori produk -->
    <div class="mb-2 text-muted">Category: {{ $product->category->name }}</div>
    
    <!-- Menampilkan deskripsi produk -->
    <p>{{ $product->description }}</p>
    
    <!-- Menampilkan harga produk dalam format Rupiah -->
    <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>

    <!-- Tombol untuk kembali ke daftar produk -->
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
</x-template>
