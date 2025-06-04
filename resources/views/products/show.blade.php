{{-- Halaman detail produk --}}
<x-template title="Product Detail">
    {{-- Nama produk --}}
    <h1>{{ $product['name'] }}</h1>
    {{-- Kategori produk --}}
    <span class="badge bg-secondary">{{ $product['category'] }}</span>
    {{-- Deskripsi produk --}}
    <p>{{ $product['description'] }}</p>
    {{-- Harga produk --}}
    <p><strong>Rp {{ $product['price'] }}</strong></p>
</x-template>
