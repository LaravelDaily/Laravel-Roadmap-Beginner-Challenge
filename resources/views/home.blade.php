<x-guest-layout>
  <div class="min-h-screen bg-white p-4">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      @foreach ($articles as $article)
        <article class="mb-2">
          <div class="flex justify-between">
            <h1 class="text-3xl hover:bg-blue-50 rounded-lg -mx-2 px-2">
              <a href="{{ route('blog.article', $article->id) }}">
                {{ $article->title }}
              </a>
            </h1>
            @if ($article->category)
              <div>
                ({{ $article->category->name }})
              </div>
            @endif
          </div>
          <div class="text-sm">Created {{ $article->created_at->diffForHumans() }}</div>
        </article>
      @endforeach
      <div class="mt-6">{{ $articles->links() }}</div>
    </div>
  </div>
</x-guest-layout>