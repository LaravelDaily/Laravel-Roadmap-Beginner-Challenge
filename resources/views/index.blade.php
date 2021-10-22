@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Articles</h1>
        @forelse($articles->chunk(3) as $articless)
        <div class="row mb-5">
            @foreach($articless as $article)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        @if(!empty($article->img_url))
                            <img class="card-img-top" src="{{ asset('storage/images/' . $article->img_url) }}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::words($article->text, 20, '...') }}</p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Read the rest</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @empty
            <div>
                No articles!
            </div>
        @endforelse
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
