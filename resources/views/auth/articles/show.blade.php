<h1>{{ $article->title }}</h1>
@isset($article->category)
    <span>{{ $article->category->name }}</span>
@endisset
<textarea>{{ $article->body }}</textarea>
<img src="{{ $article->image }}" alt="{{ $article->title }}">
@foreach ($article->tags as $tag)
    <span>{{ $tag->name }}</span>
@endforeach