<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'My Website') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen pt-12 md:pt-14">
            @include('layouts.master-navigation')
            
            <div id="app">
                @yield('content')
            </div>

            <footer class="py-5 bg-gray-800 h-36">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; My Website 2021</p>
                </div>
            </footer>
        </div>
    </body>
</html>