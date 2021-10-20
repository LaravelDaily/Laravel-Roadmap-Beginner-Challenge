@extends('layout.site-layout')


@section('site-title')
    <title>{{ config('app.name', 'Laravel') }} - Article | {{ $article->title }}</title>
@endsection


@section('content')
    <div class=" w-100 d-flex flex-column align-items-center mt-4">
        <section class="w-75">
            <img src="{{ $article->image }}" alt="">
            <h1 class="text-center">{{ $article->title }}</h1>
            <p class="mt-4">
                {{ $article->full_text }}
            </p>
            <p>
                Category: <a href="#"> {{ $article->category->name }}</a>
            </p>
            <div>
                <p>Tags</p>
                <ul>
                    @foreach ($article->tags as $tag)
                        <a href="#">{{ $tag->name }}</a>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection
