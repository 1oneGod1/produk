<x-template title="Add/Edit Product">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ isset($id) ? route('products.update', $id) : route('products.store') }}" class="was-validated">

        @csrf

        <x-form.group for="name" label="Name">
            <input id="name" type="text" name="name" class="form-control" required value="{{ $product['name'] ?? '' }}">
        </x-form.group>

        <x-form.group for="description" label="Description">
            <textarea id="description" name="description" class="form-control" required>{{ $product['description'] ?? '' }}</textarea>
        </x-form.group>

        <x-form.group for="price" label="Price">
            <input id="price" type="number" name="price" class="form-control" required value="{{ $product['price'] ?? '' }}">
        </x-form.group>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-template>
