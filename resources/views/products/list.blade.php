<x-template title="Product List">

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <a class="btn btn-success" href="{{ route('products.create') }}">Add new product</a>

    <form method="GET" class="row g-2 mt-3">
        <div class="col-md-3">
            <input type="text" name="q" class="form-control" placeholder="Search" value="{{ $request->q }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="min_price" class="form-control" placeholder="Min price" value="{{ $request->min_price }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="max_price" class="form-control" placeholder="Max price" value="{{ $request->max_price }}">
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="">Sort by</option>
                <option value="name" {{ $request->sort === 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ $request->sort === 'price' ? 'selected' : '' }}>Price</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="submit">Filter</button>
        </div>
    </form>

    {{-- Cek jika kosong --}}
    @if(count($products) == 0)
        <p class="text-muted mt-3">Belum ada produk.</p>
    @else
        @foreach($products as $id => $product)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <span class="badge bg-secondary">{{ $product['category'] }}</span>
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
