<x-app-layout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h2 class="mb-3 text-2xl font-bold text-center leading-7 text-white sm:text-3xl sm:truncate">
          {{__('Articles')}}
        </h2>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="-my-8 divide-y-2 divide-gray-100">
              @foreach ($posts as $post)
              <div class="flex flex-wrap py-8 md:flex-nowrap">
                <div class="flex flex-col flex-shrink-0 mb-6 md:w-64 md:mb-0">
                  <img class="h-20 w-20" src="/storage/uploads/{{$post->image_path}}" alt="" />
                </div>
                <div class="md:flex-grow">
                  <div class="space-y-6">
                    <div>
                      <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $post->title }}</h2>
                      <div class="flex flex-wrap">
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.index', $tag->id) }}">
                          <span
                            class="inline-flex items-center justify-center px-2 py-1 text-xs uppercase mr-1 font-bold leading-none text-red-100 bg-gray-400 rounded-full">
                            {{ $tag->name }}
                          </span>
                        </a>
                        @endforeach
                      </div>
                      <a href="{{ route('categories.index', $post->category->id) }}">
                        <p class="mt-2"><strong>Category: </strong>{{ $post->category->name }}</p>
                      </a>
                      <span class="mt-1 text-sm text-gray-500">{{ $post->created_at->format('d F Y') }}</span>
                    </div>
                    <div>
                      <p class="leading-relaxed">{{ $post->post }}</p>
                    </div>
                  </div>
                  <x-nav-link href="{{ route('posts.show', $post) }}">Read More </x-nav-link>
                </div>
              </div>
              @endforeach
            </div>
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>