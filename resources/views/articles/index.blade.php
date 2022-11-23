<x-app-layout>
    <x-header text="Your Articles">
        <x-anchor-button href="{{ route('articles.create') }}">New</x-anchor-button>
    </x-header>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <div class="rounded-lg overflow-hidden w-full bg-white shadow-xl"
                onclick="window.location='{{ route('articles.show', $article->slug) }}'">
                <img class="aspect-video w-min-full" src="{{ asset('storage/' . $article->image) }}" alt="Shoes" />
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-gray-900 tracking-wide text-xl font-medium">
                            {{ $article->title }}
                        </h2>
                        <a href=""
                            class="bg-indigo-500 py-1 px-2 text-center text-white rounded-full text-xs font-medium">{{ $article->category->name }}</a>
                    </div>
                    <p class="text-sm text-gray-700 font-thin tracking-tight leading-1">
                        {{ str($article->body)->limit(120, '... read more') }}
                    </p>
                    <div class="flex justify-end gap-x-1">
                        @foreach ($article->tags as $tag)
                            <a href=""
                                class="tracking-tight italic text-xs font-medium before:content-['#']">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
