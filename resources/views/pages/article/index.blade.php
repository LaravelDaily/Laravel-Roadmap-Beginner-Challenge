<x-pages.article.layout>

    <table class="table-auto w-full mt-4">
        <thead>
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="text-center">
                    <td><img src="{{asset($article->small_image)}}"></td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <a href="{{route('articles.show', $article->id)}}">
                            <x-button>View</x-button>
                        </a>
                        @auth
                            <a href="{{route('articles.edit', $article->id)}}">
                                <x-button>Edit</x-button>
                            </a>
                            <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                                @method('DELETE')
                                @csrf
                                
                                <x-button class="mt-1">
                                    {{ __('Delete') }}
                                </x-button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $articles->links() }}
      
</x-pages.article.layout>
