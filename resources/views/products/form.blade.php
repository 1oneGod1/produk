<x-template>
    <!-- Judul form, menyesuaikan apakah sedang menambah atau mengedit produk -->
    <h2>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h2>
    
    <!-- Form untuk menambah atau mengedit produk -->
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
        @csrf

        <!-- Input untuk nama produk -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="{{ old('name') ?? $product->name ?? '' }}" required>
        </div>

        <!-- Input untuk deskripsi produk -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') ?? $product->description ?? '' }}</textarea>
        </div>

        <!-- Input untuk harga produk -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" name="price" id="price" class="form-control"
                   value="{{ old('price') ?? $product->price ?? '' }}" required>
        </div>

        <!-- Dropdown untuk memilih kategori produk -->
        <div class="mb-3">
            <label for="product_category_id" class="form-label">Category</label>
            <select name="product_category_id" id="product_category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('product_category_id') ?? $product->product_category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Input untuk mengunggah foto produk -->
        <div class="mb-3">
            <label for="photo" class="form-label">Product Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if(isset($product) && $product->photo)
                <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <!-- Tombol untuk menyimpan data -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-template>
