@extends('boilerplate')
@section('content')
<br>
<div class="container-xl">
    <div class="row">
        @forelse ($articles as $article)
            <div class="col-md-4">
                <div class="card" style="width: 18rem; height:25rem;margin-bottom:17px;">
                    <img src="{{ asset('storage/article/'.$article->image) }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->body, 100 ) }}</p>
                        <a href="#" class="label label-primary">{{ $article->category->name }}</a>
                        <br>
                        @foreach ($article->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="card-body">
                <h5 class="card-title">No Articles</h5>
                <p class="card-text">There are no articles to display</p>
            </div>
        @endforelse
        
    </div>
    {{ $articles->links() }}
</div>
<br>
@endsection