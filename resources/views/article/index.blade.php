<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Articles') }}
        </h2>
    
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="mt-6  shadow-sm rounded-lg">
        @foreach ($articles as $article)
            <div class="p-6 bg-white mb-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-800">Category:{{ $article->category->name }}</span>
                        </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-800">Tags:   
                                @foreach ($article->tags as $tag)
                                    {{ $tag->name }},
                                @endforeach
                        </span>
                    </div>
                
                    <a class="text-gray-800">{{ $article->title }}</a>
                    <div class="flex justify-between items-stretch">
                        <p class="text-lg text-gray-900">{{ $article->full_text }}</p>
                        <img src="{{asset('images/'.$article->image)}}" alt="" class="place-self-stretch rounded-md  h-20" >
                    </div>
                    <a href="{{ route('articles.show', $article) }}"
                    <x-secondary-button>Read more</x-secondary-button>
                    </a>
                
                    <small class="ml-2 text-sm text-gray-600 float-end">{{ $article->created_at->format('j M Y, g:i a') }}</small>


            </div>
        @endforeach
    </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>