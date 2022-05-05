<x-layout-manage>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>Tag Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->name }}</td>
                <td class="text-center"><a href="{{ route('tag.edit', $tag) }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ route('tag.destroy', $tag) }}" method="POST">
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
                    <a href="{{ route('tag.create') }}">
                        Create New Tag
                    </a>
                </x-button>
            </td>
        </tr>

        </tbody>

    </table>
</x-layout-manage>
