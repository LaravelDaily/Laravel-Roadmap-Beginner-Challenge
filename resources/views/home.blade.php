@extends('layouts.main')

@section('content')
    <div class="w-full">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">
            @forelse($articles as $article)
                <div class="scale-100 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-all duration-250">
                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                <a href="{{ route('article.show', $article) }}" class="hover:underline">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $article->created_at->format('d M Y H:i:s') }}
                            </span>
                        </div>

                        @if($article->image)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover rounded-lg">
                            </div>
                        @endif

                        <p class="mt-4 text-gray-700 dark:text-gray-300">
                            {{ Str::words($article->content, 20, '...') }} <a href="{{ route('article.show', $article) }}">>>></a>
                        </p>

                        @if($article->category)
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">                                                
                                    <span class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full">
                                        {{ $article->category->title }}
                                    </span>                                                
                                </div>
                            </div>
                        @endif
                        
                        @if($article->tags->count() > 0)
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($article->tags as $tag)
                                    <span class="px-3 py-1 text-sm bg-indigo-200 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-full">
                                        {{ $tag->title }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="scale-100 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                    <div>
                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">No articles.</h2>
                        <p class="mt-4 text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            There are no articles for now.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
