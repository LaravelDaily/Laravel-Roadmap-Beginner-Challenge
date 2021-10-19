<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @yield('site-title')
</head>

<body class="d-flex flex-column  min-vh-100">
    <header>
        <nav class="container-fluid  navbar navbar-light justify-content-between d-flex"
            style="background-color: #e3f2fd;">
            <a class="text-decoration-none text-dark" href="{{ url('/') }}">
                <h1 class=''>My Blog</h1>
            </a>
            <div class="d-flex">
                <a class="mx-4 nav-link" href="{{ url('/') }}">Articles</a>
                <a class="nav-link" href="{{ route('about-me') }}">About Me</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline nav-link">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline nav-link">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </header>
    <main class="container flex-grow-1">
        @yield('content')
    </main>

    <footer class="container-fluid bg-dark text-white text-center  ">
        <small>Developed by <a href="https://github.com/denisfelic" target="blank">denisfelic</a></small>
    </footer>
</body>

</html>
