<x-app-layout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h2 class="mb-3 text-2xl font-bold text-center leading-7 text-gray-900 sm:text-3xl sm:truncate">
          {{$article->title}}
        </h2>
        <div class="my-3">
          <img class="mx-auto" width="50%" height="200px" src="/storage/uploads/{{$article->image_path}}" alt="" />
        </div>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="pb-8 space-y-1 border-b border-gray-200 dark:border-gray-700">
              <dl class="flex justify-between">
                <div>
                  <div>
                    <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $article->title }}</h2>
                    <div class="flex flex-wrap">
                      @foreach ($article->tags as $tag)
                      <a href="{{ route('tags.index', $tag->id) }}">
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs uppercase mr-1 font-bold leading-none text-red-100 bg-gray-400 rounded-full">
                          {{ $tag->name }}
                        </span>
                      </a>
                      @endforeach
                    </div>
                    <a href="{{ route('categories.index', $article->category->id) }}">
                      <p class="mt-2"><strong>Category: </strong>{{ $article->category->name }}</p>
                    </a>
                  </div>
                  <dt>Published on</dt>
                  <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                    <span class="mt-1 text-sm text-gray-500">{{ $article->created_at->format('d F Y') }}</span>
                  </dd>
                </div>
                <div>
                  <p class="leading-relaxed">{{ $article->body }}</p>
                </div>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>