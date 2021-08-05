<x-app-layout>
  <x-header>Article Details</x-header>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:mx-6 lg:mx-8 sm:p-6 lg:p-8 bg-white rounded-xl">
      <div class="flex justify-between">
        <h1 class="text-3xl my-2">{{ $article->title }}</h1>
        <div class="inline-flex items-center">
          <a href="{{ route('articles.edit', $article->id) }}">
            <x-icons.edit class="h-6 w-6 hover:text-gray-700" />
          </a>
          <div
            x-data
            @click.prevent="$dispatch('open-delete-modal', {
              route: '{{ route('articles.destroy', $article) }}',
              entity: '{{ $article->title }}',
              subText: '',
            })"
          >
            <x-icons.delete class="h-8 w-8 hover:text-red-600 fill-current" />
          </div>
        </div>
      </div>

      <div class="flex justify-between space-x-8">
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
  </div>
</x-app-layout>
