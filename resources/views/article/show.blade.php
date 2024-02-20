
<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 p-6 bg-white">
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

    <small class="ml-2 text-sm text-gray-600 float-end">{{ $article->created_at->format('j M Y, g:i a') }}</small>
    <x-input-success :messages="session('status')" class="mt-2" />
    @auth
    <a href="{{ route('articles.edit', $article) }}"
    <x-secondary-button>Edit article</x-secondary-button>
    </a> 
    @endauth
 
</div>
</x-app-layout>