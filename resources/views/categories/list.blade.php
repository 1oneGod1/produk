<x-template>
    <div class="text-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add new category</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-template>
