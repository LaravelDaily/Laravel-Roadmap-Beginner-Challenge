@extends('customer.layouts.master')

@section('head-tag')
    <title>article title</title>
@endsection

@section('content')
    <section class="border-b flex justify-between items-center pb-2">
        <h1 class="text-4xl">
            {{ $article->title }}
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

    @if ($article->tags->isNotEmpty())
        <section class="mt-1 flex flex-row flex-wrap items-center">
            <span>tags:</span>
            <section class="flex gap-2 p-2 flex-wrap">
                @foreach($article->tags as $tag)
                    <x-badge class="hover:!bg-gray-300">{{ $tag->name }}</x-badge>
                @endforeach
            </section>
        </section>
    @endif

    <section class="mt-1 flex flex-row flex-wrap items-center">
        <span>categories:</span>
        <section class="flex gap-2 p-2 flex-wrap">
            @foreach($article->categories as $category)
                <x-badge class="hover:!bg-gray-300">{{ $category->name }}</x-badge>
            @endforeach
        </section>
    </section>

    <section>
        author: <span class="text-xl font-bold">{{ $article->author->name }}</span>
    </section>

    <section class="mt-1 border-t pt-2">
        <p>{{ $article->full_text }}</p>
    </section>

@endsection
