<x-layout>
    <h1 class="font-black text-4xl">Articles</h1>
    @foreach($articles as $article)
        <x-article-card :article="$article"/>
    @endforeach

    {{ $articles->links() }}
</x-layout>
