@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Article {{ $article->title }}</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            Image
        </div>
        <div class="col-sm-8">
            <img src="{{ asset($article->image) }}" alt="" title="" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            Category
        </div>
        <div class="col-sm-8">
            {{ $article->category->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            Tags
        </div>
        <div class="col-sm-8">
            @foreach ($article->tags as $tag)
                <span class="badge badge-success">
                    {{ $tag->tag->name }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            Creator
        </div>
        <div class="col-sm-8">
            {{ $article->user->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            Content
        </div>
        <div class="col-sm-8">
            {{ $article->content }}
        </div>
    </div>
@endsection
