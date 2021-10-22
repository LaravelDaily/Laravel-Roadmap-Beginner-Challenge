@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($article)
                    @if(!empty($article->img_url))<img width="50%" src="{{ asset('storage/images/' . $article->img_url) }}" alt="alternative text">@endif
                    <h2>{{ $article->title }}</h2>
                    {{--                <p>created: {{ $article->created_at->format('Y') }}</p>--}}
                    @if(!empty($article->category))
                        <p>Category: <span class="badge badge-secondary">{{ $article->category->name }}</span></p>
                    @endif
                    @if(count($article->tags) > 0)
                        <p>Tags:
                            @foreach($article->tags->pluck('name') as $name)
                                <span class="badge badge-secondary">{{ $name }}</span>
                            @endforeach
                        </p>
                    @endif
                    <p>{{ $article->text }}</p>
                @else
                    <p>No data from article</p>
                @endif
            </div>
        </div>
    </div>
@endsection
