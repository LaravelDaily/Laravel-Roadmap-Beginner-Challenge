<div>
    <form method="POST" action="{{ route('auth.articles.update', $article) }}" >
        @csrf
        @method('PATCH')
 {{-- holy shit con esto... fixear plz --}}
        Title: <input type="text" name="title" value="{{ $article->title }}"><br>

        Body: <input type="textarea" name="body" value="{{ $article->body }}"><br>

        <input type="submit">
    </form>
</div>