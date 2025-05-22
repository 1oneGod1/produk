<x-template title="Product List">

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <a class="btn btn-success" href="{{ route('products.create') }}">Add new product</a>

    {{-- Cek jika kosong --}}
    @if(count($products) == 0)
        <p class="text-muted mt-3">Belum ada produk.</p>
    @else
        @foreach($products as $id => $product)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p>{{ $product['description'] }}</p>
                    <p><strong>Rp {{ $product['price'] }}</strong></p>

                    <a href="{{ route('products.edit', $id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('products.show', $id) }}" class="btn btn-info">View</a>

                    <form action="{{ route('products.destroy', $id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

</x-template>
