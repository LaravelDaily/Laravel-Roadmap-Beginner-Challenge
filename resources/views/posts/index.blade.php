@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">{{ __('Posts') }}</div>
                        <div class="card-body">
                            @auth
                                <a class="btn btn-primary" href="{{ route('posts.create') }}"> Add new Post</a>
                            @endauth
                            <div class="d-flex justify-content-start m-1">
                                @foreach ($posts as $post)
                                    <div class="card p-1" style="width: 25rem;">
                                        <div>
                                            <a href="{{ route('posts.show', $post->id) }}">
                                                <img class="card-img-top"
                                                    @if (!$post->image) src="{{ asset('image/noimage.jpg') }}"
                                            @else
                                                src="storage/images/{{ $post->image }}" @endif
                                                    alt="Card image cap">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                            <p class="card-text">{{ $post->description }}</p>
                                        </div>
                                        @auth
                                            <div class="">
                                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
