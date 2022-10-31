<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Personal blog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div id="app">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #575A57;" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white" href="{{ route('home') }}">Personal Blog</a>
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('aboutme') }}">About</a></li>
                        @guest
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('login') }}">Login</a></li>
                        @endguest
                        @auth
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
