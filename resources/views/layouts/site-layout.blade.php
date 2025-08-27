<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> {{ $title ??  'Welcome' }} | App World</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}} " />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>


        <x-site.navigation />

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{ $page_title ?? 'Welcome to our App World' }}</h1>
                    <p class="lead mb-0">{{ $page_desc ?? 'Thank you for coming to our app World'}}</p>
                </div>
            </div>
        </header>

        {{ $slot }}

        <x-site.footer />

    </body>
</html>
