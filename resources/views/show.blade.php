<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @isset($article->image)
                <img src="{{ asset($article->image) }}" class="mr-6 w-56 rounded-lg float-left">
                @endif
                <h2 class="mb-2 font-semibold text-xl text-gray-800 leading-tight">{{ $article->title }}</h2>
                <p class="mb-1.5">
                    <span class="px-3 py-1 font-medium text-xs bg-cyan-700 text-white rounded-full">{{ $article->category->name }}</span>
                </p>
                <p class="mb-1 font-normal text-base text-gray-600">{{ $article->fulltext }}</p>
                <p class="mb-1.5">
                    @foreach ($article->tags as $tag)
                    <span class="px-2 py-1 text-xs bg-teal-700 text-gray-50 rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </p>
                <p><span class="text-sm italic text-gray-900 font-normal">{{ $article->created_at->format('d F Y') }}</span></p>
            </div>
            @auth
            <div class="w-full bg-slate-50 mt-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-7 ml-6 sm:ml-0 verflow-hidden shadow-sm sm:rounded-lg">
                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                            onsubmit="return confirm('Do you really wish to delete this fine article?');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <x-redbutton>Delete this Article</x-redbutton>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</x-app-layout>