<x-template title="Product Detail">
    <h1>{{ $product['name'] }}</h1>
    <span class="badge bg-secondary">{{ $product['category'] }}</span>
    <p>{{ $product['description'] }}</p>
    <p><strong>Rp {{ $product['price'] }}</strong></p>
</x-template>
