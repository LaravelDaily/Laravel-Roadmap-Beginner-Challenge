<x-app-layout>
  <x-slot name="header">
      <!-- Navigation bar -->
      <nav class="bg-gray-800 text-white">
          <div class="container mx-auto flex items-center justify-between py-4 px-6">
              <!-- Logo -->
              <div>
                  <a href="{{ route('home') }}" class="text-2xl font-bold">My Blog</a>
              </div>
              <!-- Navigation links -->
              <div>
                  @auth
                      <a href="{{ route('articles.create') }}" class="hover:text-gray-300 ml-4">Add Article</a>
                  @endauth
              </div>
          </div>
      </nav>
  </x-slot>

  <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
              @foreach ($articles as $article)
              <div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow-md">
                  <img class="object-cover object-center" style="height: 20em;" src="/storage/uploads/{{$article->image_path}}" alt="Article Image">
                  <div class="p-6">
                      <h2 class="mb-4 text-xl font-semibold text-gray-900">{{ $article->title }}</h2>
                      <div class="flex flex-wrap mb-4">
                          @foreach ($article->tags as $tag)
                          <a href="{{ route('tags.index', $tag->id) }}">
                              <span style="background: cornflowerblue;" class="inline-block px-2 py-1 text-xs font-semibold text-black rounded-full mr-2">{{ $tag->name }}</span>
                          </a>
                          @endforeach
                      </div>
                      <p class="mb-4 text-sm text-gray-600"><strong>Category:</strong> {{ $article->category->name }}</p>
                      <p class="mb-4 text-sm text-gray-600">{{ $article->created_at->format('d F Y') }}</p>
                      <p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($article->article, 150, $end='...') }}</p>
                  </div>
                  <div class="flex items-center justify-between px-6 py-4 bg-gray-100">
                      <a href="{{ route('article.show', $article) }}" class="text-sm font-semibold text-gray-900 hover:text-gray-600">Read More</a>
                  </div>
              </div>
              @endforeach
          </div>
          <!-- Pagination -->
          <div class="mt-8">
              {{ $articles->links() }}
          </div>
      </div>
  </div>
</x-app-layout>
