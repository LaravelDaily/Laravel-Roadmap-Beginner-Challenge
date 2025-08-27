@extends('layouts.app')

@push('css')
    <style>
        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Latest Articles') }}</div>
                    <div class="card-body">
                        @forelse($articles as $article)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    @if($article->thumbnail)
                                        <div class="col-md-4">
                                            <img
                                                src="{{ asset('storage/uploads/images/article/' . $article->thumbnail) }}"
                                                class="thumbnail-img"
                                                alt="{{ $article->title }}">
                                        </div>
                                    @endif
                                    <div class="{{ $article->thumbnail ? 'col-md-8' : 'col-md-12' }}">
                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                                            </h5>
                                            @foreach($article->tags as $tag)
                                                <a href="{{ route('tags.articles.index', $tag) }}"
                                                   class="badge badge-primary pr-1">{{ $tag->name }}</a>
                                            @endforeach
                                            <p class="card-text">{!! $article->excerpt ?? substr($article->body, 0, 100) !!}</p>
                                            <p class="card-text"><small
                                                    class="text-muted">{{ $article->created_at->diffForHumans() }} in <a
                                                        href="{{ route('categories.articles.index', $article->category) }}">{{ $article->category->name }}</a></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info text-center" role="alert">
                                {{ __('No article found!') }}
                            </div>
                        @endforelse
                        @if($articles)
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary" href="{{ route('articles.index') }}"
                                   role="button">{{ __('All Articles') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
