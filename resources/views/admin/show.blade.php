@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('{{ asset('storage/images/'.$article->image_path) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <h2 class="subheading">{{ $article->excerpt }}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $article->user->name }}</a>
                            on {{ $article->created_at->format('F d, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{ $article->body }}</p>
                </div>
            </div>
        </div>
    </article>
@endsection