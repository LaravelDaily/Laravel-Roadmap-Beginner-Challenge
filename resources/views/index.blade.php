@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Articles</h1>
                @forelse($articles as $article)
                    <p><a href="{{ route('article.show', $article) }}">{{ $article->title }}</a></p>
                @empty
                    <p>No articles</p>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
