@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <x-card :title="$article->category->name ?? ''">
            <h5 class="card-title fs-1">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->author->name }} <br>
                <span class="text-muted ">{{ $article->updated_at }}</span>
            </p>

            <img src="{{ $article->image_url ? asset('storage/' . $article->image_url) : asset('storage/download.png') }}"
                class="img-fluid" alt="...">
    </div>

    <p class="text-start m-3 fs-4">{{ $article->full_text }}</p>

    <div class="card-footer text-muted">
        @foreach ($article->tags as $tag)
            {{ $tag->name }},
        @endforeach
        </x-card>
    </div>
@endsection
