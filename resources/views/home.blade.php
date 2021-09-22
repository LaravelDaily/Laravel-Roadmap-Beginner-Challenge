<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- styles -->
    <link href="/css/app.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($articles as $article)
            <div>
                <a href="{{ $article->url }}">
                    <h1>{{ $article->title }}</h1>
                </a>
                <span>{{ $article->category->name }}</span>
                <p> {{ $article->excerpt }}</p>
                <img src="{{ $article->image }}" alt="{{ $article->title }}">
            </div>
        @endforeach
    </div>

    {{ $articles->links() }}
</body>
</html>