<x-template title="Welcome">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Produk App</h1>
            <p class="col-md-8 fs-4">Selamat datang di aplikasi daftar produk sederhana.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
        </div>
    </div>
</x-template>
