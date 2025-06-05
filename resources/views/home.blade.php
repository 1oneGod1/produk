<x-template>
    <div class="text-center py-5 bg-light rounded shadow-sm">
        <!-- Judul utama halaman beranda -->
        <h1 class="display-4 fw-bold">Discover Our Products</h1>
        
        <!-- Deskripsi singkat tentang produk -->
        <p class="lead text-muted">Explore our collection of high-quality products!</p>

        <!-- Tombol untuk menuju halaman produk -->
        <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg px-4">Shop Now</a>
    </div>
</x-template>
