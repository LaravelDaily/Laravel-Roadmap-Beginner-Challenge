@extends('layouts.master')

@section('content')
<div class="container">
    <div class="flex flex-wrap items-center">
        <div class="grid md:grid-cols-4 mx-auto w-full">
            <h1 class="col-start-2 col-span-2 my-6 text-center text-4xl font-medium">Welcome to the Blog </h1>

            @foreach ($articles as $article)
            <div class="col-start-2 col-span-2 flex flex-col border border-gray-300 rounded mb-4">
                <img class="w-full" src="{{ $article->image_url }}" alt="{{ $article->title }}">
                <div class="flex-auto p-4 m-3">
                    <h2 class="mb-3 text-center text-4xl font-medium capitalize">{{ $article->title }}</h2>
                    @if($article->category)
                    <p class="text-center text-gray-400 capitalize mt-0">
                        {{ $article->category->name }}
                    </p>
                    @endif
                    <p class="p-2 m-2">{{ \Illuminate\Support\Str::limit($article->full_text, $limit = 280, $end = '...')}}</p>
                    <a href="{{ route('articles.view', $article->id)}}" class="btn btn-primary p-2 text-white text-base bg-blue-500 border-blue-500 font-normal cursor-pointer text-center rounded">Read More &rarr;</a>
                </div>
                <div class="px-3 py-5 bg-black bg-opacity-10 border-t border-gray-300 text-gray-400 space-y-4">
                    <p>Created {{ $article->created_at->diffForHumans() }}</p>

                    <div>
                        @foreach($article->tags as $tag)
                            <span class="bg-red-300 p-1.5 m-2 rounded-full text-sm text-red-800 font-semibold">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        <div class="mx-32 my-10">{{ $articles->links() }}</div>
</div>
@endsection