<x-layout-manage>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>Article</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td class="text-center"><a href="{{ route('manage.article.edit', $article) }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ route('manage.article.destroy', $article) }}" method="POST">
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
                    <a href="{{ route('manage.article.create') }}">
                        Create New Article
                    </a>
                </x-button>
            </td>
        </tr>

        </tbody>

    </table>
</x-layout-manage>
