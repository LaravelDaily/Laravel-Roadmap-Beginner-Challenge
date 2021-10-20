@extends('layout.site-layout')


@section('site-title')
    <title>{{ config('app.name', 'Laravel') }} - Articles</title>
@endsection


@section('content')
    <div class=" w-100 d-flex flex-column align-items-center mt-4">
        <section class="w-75">
            <h1 class="text-center">List of articles</h1>
            <ul class="mt-4">
                @foreach ($articles as $article)
                    <li class="d-flex">
                        <img class="w-25 h-25"
                            src="data:image/jpg;charset=utf8;base64,{{ base64_encode($article->image) }}" />


                        <div>
                            <a href="{{ route('article-show', $article->id) }}">
                                <h3>{{ $article->title }}</h3>
                            </a>
                            <p>{{ $article->full_text }}</p>
                        </div>

                    </li>
                    <hr>
                @endforeach
            </ul>
            <div class="">
                <div class="d-flex justify-content-center">
                    {!! $articles->links() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
