@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    @if($article->thumbnail)
                        <img class="card-img-top"
                             src="{{ asset('storage/uploads/images/article/' . $article->thumbnail) }}"
                             alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        @foreach($article->tags as $tag)
                            <a href="{{ route('tags.articles.index', $tag) }}"
                               class="badge badge-primary pr-1">{{$tag->name}}</a>
                        @endforeach
                        <p class="card-text">{!! $article->body !!}</p>
                        <p class="card-text"><small class="text-muted">
                                {{ $article->created_at->diffForHumans() }} in <a
                                    href="{{ route('categories.articles.index', $article->category) }}">{{ $article->category->name }}</a></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endsection
