<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="https://preview.webpixels.io/web/img/logos/clever-light.svg" class="h-8" alt="...">
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse">
            <!-- Nav -->
            <div class="navbar-nav mx-lg-auto">
                <a class="nav-item nav-link active" href="{{ route('home') }}" aria-current="page">{{ __('Home') }}</a>
                <a class="nav-item nav-link" href="{{ route('about') }}">{{ __('About Me') }}</a>
                @auth
                <a class="nav-item nav-link" href="{{ route('articles.index') }}">{{ __('Articles') }}</a>
                <a class="nav-item nav-link" href="{{ route('logout') }}" >{{ __('Logout') }}</a>
                @endauth
                @guest
                <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endguest
            </div>
        </div>
    </div>
</nav>