@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @foreach ($posts as $post)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="d-inline">
                                @if($post->image)
                                <img src="{{ asset('storage/posts_img/' . $post->image) }}" width="100" height="100" class="img-fluid">
                            @endif
                            </div>
                            <div class="d-inline">
                                <div class="text-muted">{{ $post->created_at->format('d F Y') }}, category: {{ $post->category->name }}</div>
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <div class="text-muted">Tags: 
                                    @foreach ($post->tags as $tag)
                                        {{ $tag->name }} 
                                    @endforeach
                                </div>
                            </div>
                            
                            <hr>
                            <p class="card-text">{{ $post->post }}</p>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
