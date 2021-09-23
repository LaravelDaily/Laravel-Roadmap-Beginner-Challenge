@extends('layout.layout')

@section('styles')
    <style>
        img {
            max-width: 200px;
            max-height: 200px;
        }

    </style>
@endsection

@section('title')
    Article
@endsection

@section('content')
    <main class="container mt-5 px-5">
        <section class="container border rounded px-0">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Show Article</h4>
            <div class="border-bottom mb-3 p-3">
                <div>Title: <b>{{ $article->title }}</b></div>
                @if ($article->image != null)
                    <img src="{{ asset('storage/uploads/' . $article->image) }}" alt="">
                @endif
                <p>Category: {{ $article->category->name }}</p>
                <p>Body: {{ $article->body }}</p>
                <p>Tags:
                    @foreach ($article->tags as $tag)
                        <a href="">{{ $tag->name }}</a>
                    @endforeach
                </p>
            </div>
        </section>
    </main>
@endsection
