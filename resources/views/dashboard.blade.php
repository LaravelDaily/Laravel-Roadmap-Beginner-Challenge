<x-app-layout>
  <x-header>Dashboard</x-header>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:mx-6 lg:mx-8 sm:p-6 lg:p-8 bg-white rounded-xl">
      <div class="flex space-x-8">
        <div class="md:w-3/5">
          <div>
            <h3 class="text-xl mb-4">Latest Articles</h3>
            @if ($articles)
              <ul>
                @foreach ($articles as $article)
                  <li>
                    <a href="{{ route('articles.show', $article->id) }}">
                      {{ $article->title }}
                    </a>
                  </li>
                @endforeach
              </ul>
            @else
              <a href="{{ route('articles.create') }}">
                Create your frist Article
              </a>
            @endif
          </div>
        </div>
        <div class="md:w-2/5">
          <a href="{{ route('articles.create') }}">
            <x-button>Create new Article</x-button>
          </a>
        </div>
      </div>
      <div class="mt-6">{{ $articles->links() }}</div>
    </div>
  </div>
</x-app-layout>
