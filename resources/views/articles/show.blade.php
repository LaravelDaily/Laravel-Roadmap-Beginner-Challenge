<div>
    <h1>{{ $article->title }}</h1>
    @isset($article->category)
    <span>{{ $article->category->name }}</span>
    @endisset
</div>
<textarea>{{ $article->body }}</textarea>
<div>
    <img src="{{ $article->image }}" alt="{{ $article->title }}">
</div>
@forelse($article->tags as $tag)
    <div>
        <span>{{ $tag->name }}</span>
    </div>
@empty
@endforelse