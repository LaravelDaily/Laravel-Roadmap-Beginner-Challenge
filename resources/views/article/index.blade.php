<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Daily | Beginner Challenge</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    @foreach($articles as $article)
        <article>
            <img src="{{ $article->image }}" alt="Article Image">

            <h1>{{ $article->title }}</h1>

            <p>{{ $article->text }}</p>

            <p>{{ $article->category->name }}</p>

            @foreach($article->tags as $tag)
                <span>{{ $tag->name }}</span>
            @endforeach
        </article>
    @endforeach

    {{ $articles->links() }}
</body>
</html>
