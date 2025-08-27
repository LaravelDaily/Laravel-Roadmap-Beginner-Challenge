@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="display-6">{{ $post->title }}</h2>
        @auth
            <a href={{ route('posts.edit', $post->id) }} class="btn btn-primary">Edit Post</a>
        @endauth
    </div>
    <h3 class="my-5 text-end">Category: {{ $post->category->name }}</h3>
    <img src="../storage/image/{{ $post->image }}" alt="{{ $post->image }}" class="img-fluid rounded">
    <p class="lead my-4">{{ $post->fullText }}</p>
    @auth
        <a href={{ route('posts.index') }} class="btn btn-primary">Back To Posts</a>
    @else
        <a href={{ route('welcome') }} class="btn btn-primary">More Articles</a>
    @endauth
@endsection
