@extends('layouts.app')

@section('content')
    {{-- <div class="row justify-items-between align-items-center mb-5"> --}}
    <div class="mycontainer">
        <div class="card">
            <div class="card-header">Articles</div>
            <div class="card-body">
                @foreach ($posts as $post)
                    <div class="card mb-5">
                        <div class="card-img">
                            <img src="storage/image/{{ $post->image }}" alt="{{ $post->image }}" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <div class="card-title h4">
                                <span>
                                    {{ $post->title }}
                                </span>
                            </div>
                            <div class="text-end lead my-4">
                                Category: {{ $post->category->name }}
                            </div>
                            <div class="card-content">
                                {{ $post->fullText }}
                            </div>
                            {{-- @foreach ($post->tag as $tag)
                            <p class="lead">{{ $tag->name }}</p>
                        @endforeach --}}
                        </div>
                        <div>

                            <a href={{ route('posts.show', $post->id) }} class="btn btn-warning col-12 rounded-0">Read
                                More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $posts->links('pagination::bootstrap-5') }}
@endsection
