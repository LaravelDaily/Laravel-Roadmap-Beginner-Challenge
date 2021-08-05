<x-guest-layout>
  <div class="min-h-screen bg-white px-4">
    <div class="flex justify-between px-4 py-2 mb-4 bg-blue-50 rounded-xl">
      <div class="text-2xl">{{ $article->title }}</div>
      <div class="flex space-x-4">
        <a href="{{ route('blog') }}" class="text-sm text-gray-700 underline">back</a>
        @auth
          <a href="{{ route('articles.edit', $article->id) }}" class="text-sm text-gray-700 underline">
            <x-icons.edit class="h-6 w-6" />
          </a>
        @endauth
      </div>
    </div>

    <div class="flex justify-between space-x-8 p-4">
      <div class="w-1/2 text-sm">
        <div>Created {{ $article->created_at->diffForHumans() }}</div>
        @if ($article->created_at->notEqualTo($article->updated_at) )
          <div>Last edit was {{ $article->updated_at->diffForHumans() }}</div>
        @endif
        <div class="my-4">
          @if ($article->category)
            Category: {{ $article->category->name }}
          @else
            No Category
          @endif
        </div>
        <div class="my-4">
          @if ($article->tags->count())
            Tags:
            <ul class="ml-4">
              @foreach ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
              @endforeach
            </ul>
          @else
            No Tags
          @endif
        </div>
      </div>
      <div class="w-1/2 text-sm">
        @if ($article->image)
          <img src="{{ asset($article->image)}}" alt="{{ $article->title }} Featured Image">
        @endif
      </div>
    </div>
    <div class="pt-6">
      {{ $article->body }}
    </div>
  </div>
</x-guest-layout>
