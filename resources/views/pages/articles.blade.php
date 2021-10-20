@extends('layout.site-layout')


@section('site-title')
    <title>{{ config('app.name', 'Laravel') }} - Articles</title>
@endsection


@section('content')
    <div class=" w-100 d-flex flex-column align-items-center mt-4">
        <section class="w-75">
            <h1 class="text-center py-4">List of articles</h1>
            <ul class="mt-4">
                @foreach ($articles as $article)
                    <li class="d-flex justify-between align-items-center">
                        <img class="w-25 h-25  m-4 border" src={{ asset("storage/$article->image") }} />


                        <div>
                            <a class="text-decoration-none text-dark" href="{{ route('article-show', $article->id) }}">
                                <h3 class="text-sm">{{ $article->title }}</h3>
                            </a>
                            <div class=" flex">
                                <p class="overflow-hidden" style="height: 90px">{{ $article->full_text }}</p>
                                <a href="{{ route('article-show', $article->id) }}">read more.</a>
                            </div>
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
