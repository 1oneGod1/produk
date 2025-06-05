<x-template>
    <h2>{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h2>
    <form method="POST" action="{{ $action }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="{{ old('name') ?? $category->name ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-template>
