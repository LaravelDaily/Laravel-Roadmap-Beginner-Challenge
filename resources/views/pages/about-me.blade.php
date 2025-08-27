@extends('layout.site-layout')


@section('site-title')
    <title>{{ config('app.name', 'Laravel') }} - About Me</title>
@endsection



@section('content')
    <div class=" w-100 d-flex flex-column align-items-center mt-4">
        <div>
            <h3>A little about me!</h3>
            <img src="https://github.com/denisfelic.png" width="142px" style="float: left;" alt="">
            <p class="m-4">Hello, my name is Denis Feliciano I'm live in São Paulo city in Brazil. I'm Fullstack
                developer focussed on
                PHP && JavaScript.
                This website is developed for the <a
                    href="https://github.com/LaravelDaily/Laravel-Roadmap-Beginner-Challenge"
                    target="blank">Laravel-Roadmap-Beginner-Challenge</a>.</p>
            <p>To know more about the challenge and this website visit the link above</p>
        </div>
    </div>
@endsection
