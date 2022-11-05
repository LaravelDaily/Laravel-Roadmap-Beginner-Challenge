@extends('layouts.app')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('storage/images/home.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Personal blog</h1>
                        <span class="subheading">A Blog for developers</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($articles as $article)
                <div class="post-preview">
                    <a href="{{ route('article.show', $article) }}">
                        <h2 class="post-title">{{ $article->title }}</h2>
                        <h3 class="post-subtitle">{{ $article->excerpt }}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{ $article->user->name }}</a>
                        on {{ $article->created_at->format('F d, Y') }}
                    </p>
                    <div class="d-flex gap-1">
                        @foreach ($article->tags as $tag)
                        <div class="btn btn-outline-secondary rounded-2 btn-sm">
                            {{ $tag->name }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                </div>
            </div>
        </div>
    </footer>
@endsection
