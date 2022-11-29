@extends('customer.layouts.master')

@section('head-tag')
    <title>articles</title>
@endsection

@section('content')
    <section class="border-b flex justify-between items-center pb-2">
        <h1 class="text-4xl">
            Articles
        </h1>
        <section class="flex flex-wrap gap-x-5">
            @auth
                <a href="{{ route('dashboard.index') }}">dashboard</a>
            @else
                @if(Route::has('register'))
                    <a href="{{ route('login') }}">register</a>
                @endif
                <a href="{{ route('login') }}">login</a>
            @endauth
        </section>
    </section>

    <section class="mt-3 flex flex-col gap-2">
        @foreach($articles as $article)
            <a href="{{ route('articles.show', $article->id) }}" class="cursor-pointer block hover:bg-gray-100 transition border rounded-lg p-3">
                <h2 class="text-3xl">{{ $article->title }}</h2>
                @if ($article->tags->isNotEmpty())
                    <section>
                        tags:
                        <section class="flex gap-2 p-2 flex-wrap">
                            @foreach($article->tags as $tag)
                                <x-badge class="hover:!bg-gray-300">{{ $tag->name }}</x-badge>
                            @endforeach
                        </section>
                    </section>
                @endif

                <section>
                    categories:
                    <section class="flex gap-2 p-2 flex-wrap">
                        @foreach($article->categories as $category)
                            <x-badge class="hover:!bg-gray-300">{{ $category->name }}</x-badge>
                        @endforeach
                    </section>
                </section>
                <section>
                    author: <span class="text-xl font-bold">{{ $article->author->name }}</span>
                </section>
            </a>
        @endforeach
    </section>

    {{ $articles->links() }}
@endsection
