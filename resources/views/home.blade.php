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
                        @auth
                            <a href="{{ route('article.create') }}" class="btn btn-lg mt-4 text-white" style="background-color: #575A57">CREATE ARTICLE</a>
                        @endauth
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
                    
                    @if (auth()->user() && auth()->id() === $article->user_id)
                            <div class="row">
                                <div class="col-md-1 me-1">
                                    <a class="btn btn-success btn-sm rounded-2 text-white" href="{{ route('article.edit', $article)}}">Edit</a>
                                </div>
                                <div class="col-md-1">
                                    <form action="{{ route('article.destroy', $article) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-2 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                    @endif
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
@endsection
