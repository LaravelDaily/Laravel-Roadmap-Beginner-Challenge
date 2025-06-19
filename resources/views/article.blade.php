@extends('layouts.main')

@section('content')
    <div class="w-full -mt-4">
        <div class="scale-100 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="w-full">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $article->title }}
                    </h1>
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $article->created_at->format('d M Y H:i:s') }}
                    </span>
                </div>

                @if($article->image)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $article->image) }}" 
                             alt="{{ $article->title }}" 
                             class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div class="prose dark:prose-invert max-w-none">
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ $article->content }}
                    </p>
                </div>

                @if($article->category)
                    <div class="mt-6 flex items-center justify-between">
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

                <div class="mt-8 flex justify-between items-center">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 