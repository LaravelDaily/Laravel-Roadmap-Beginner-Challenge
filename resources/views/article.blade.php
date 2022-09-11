@extends('layouts.main') 
@section('styles')
<style>
    .container {
        margin-right: auto;
        margin-left: auto;
    }

    .mt-10 {
        margin-top: 10px !important;
    }

    .image-block {
        margin-top: 24px;
        display: flex;
        flex-wrap: wrap;
    }

    .image-block-inner {
        -webkit-box-shadow: 0px 3px 10px 1px rgba(204, 204, 204 0, 1);
        -moz-box-shadow: 0px 3px 10px 1px rgba(204, 204, 204 0, 1);
        box-shadow: 0px 3px 10px 1px rgba(204, 204, 204, 1);
    }

    .image-block li>.image-block-inner {
        padding-bottom: 30px;
        background-color: #fff;
        height: 100%;
    }

    .full_text{
        text-align: justify;
        line-height: 2em;
    }

    a {
        color: #111;
        text-decoration: none;
    }

    h2,
    h4 a {
        text-transform: uppercase;
    }

    a:hover {
        text-decoration: none;
    }

    .image-block li>.image-block-inner>a {
        display: block;
        overflow: hidden;
    }

    .image-block li>.image-block-inner>a img {
        border: 1px solid #e1e1df;
    }

    .image-block li>.image-block-inner:hover {
        background-color: #eee;
    }

    .category {
        margin-bottom: 13px;
        margin-top: 35px;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.1rem;
        display: inline-block;
    }

    .news {
        font-family: 'Oswald', sans-serif;
    }

    .news .image-block li>.image-block-inner h4,
    .category,
    .news .image-block li>.image-block-inner p,
    .read-more {
        padding: 0 28px;
    }

    .read-more {
        display: block;
        text-decoration: underline;
        margin-top: 30px;
        font-weight: 600;
    }

    /* Media Queries */

    @media (min-width: 992px) {
        .col-md-5 {
            width: 41.66667%;
        }
    }

    @media (min-width: 768px) {
        .image-block li.image-block1 {
            padding-left: 26px;
            padding-right: 14.5px;
        }
    }

    @media (min-width: 1200px) {
        .image-block li>.image-block-inner>a {
            max-height: 245px;
        }
    }

    @media (min-width: 992px) {

        .pl-lg-0,
        .px-lg-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .ml-lg-0,
        .mx-lg-0 {
            margin-left: 0;
            margin-right: 0;
        }
    }
</style>




@stop 
@section('content')
<div class="container-fluid">
    <section class="news pt-0">
        <div class="container mt-md-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-block-inner">
                        <a class="mh-100" href="#">
                        <img src="{{ asset($article->image) }}" width="360" height="360"></a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="article-content">
                        <h1 class="mb-10">{{$article->title}}</h1>
                        <p class="lead full_text">{!! $article->full_text !!}</p>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-4"><span class="font-weight-bold">Category</span>:<span>{{ $article->category->name }}</span></div>
                        <div class="col-md-4"><span class="font-weight-bold">Date</span>: <span>{{ $article->created_at->diffForHumans() }}</span></div>
                        <div class="col-md-4">
                            <span class="font-weight-bold">Tags</span>: @foreach($article->tag as $tag)
                            <span class="badge badge-info">{{ $tag->name}}</span> @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{--
            <ul class="row d-lg-flex list-unstyled image-block  px-lg-0 mx-lg-0">
                <li class="col-lg-4 col-md-5 image-block full-width p-3">
                    <div class="image-block-inner">
                        <a class="mh-100" href="#">
                        <img src="{{ asset($article->image) }}" width="360" height="360"></a>
                        <span class="category">{{ $article->category->name }}</span>
                        <span>{{ $article->created_at->diffForHumans() }}</span>
                        <h4 class="mt-3"><a href="{{ route('front.article', $article->id) }}">{{ $article->title }}</a></h4>
                        <!--  <p></p> -->
                        <a href="{{ route('front.article', $article->id)}}" class="read-more">Read more ></a>
                    </div>
                    <!-- .image-block-inner -->
                </li>
            </ul> --}}
        </div>
    </section>
</div>
@endsection