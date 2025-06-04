{{-- Form tambah atau edit produk --}}
<x-template title="Add/Edit Product">
    {{-- Tampilkan error validasi jika ada --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form submit produk --}}
    <form method="post" action="{{ isset($id) ? route('products.update', $id) : route('products.store') }}" class="was-validated">

        {{-- Token CSRF --}}
        @csrf

        {{-- Input nama produk --}}
        <x-form.group for="name" label="Name">
            <input type="text" name="name" class="form-control" required value="{{ $product['name'] ?? '' }}">
        </x-form.group>

        {{-- Input deskripsi produk --}}
        <x-form.group for="description" label="Description">
            <textarea name="description" class="form-control" required>{{ $product['description'] ?? '' }}</textarea>
        </x-form.group>

        {{-- Input harga produk --}}
        <x-form.group for="price" label="Price">
            <input type="number" name="price" class="form-control" required value="{{ $product['price'] ?? '' }}">
        </x-form.group>

        {{-- Pilihan kategori produk --}}
        <x-form.group for="category" label="Category">
            <select name="category" class="form-select" required>
                <option value="" disabled {{ empty($product['category'] ?? '') ? 'selected' : '' }}>Select</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ ($product['category'] ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </x-form.group>

        {{-- Tombol submit --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-template>
