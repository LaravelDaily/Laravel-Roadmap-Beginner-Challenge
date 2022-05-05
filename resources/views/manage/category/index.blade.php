<x-layout-manage>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>Category Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td class="text-center"><a href="{{ route('category.edit', $category) }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ route('category.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>
                <x-button class="mt-4">
                    <a href="{{ route('category.create') }}">
                        Create New Category
                    </a>
                </x-button>
            </td>
        </tr>

        </tbody>

    </table>
</x-layout-manage>
