<x-layout>
    <x-section>
        <h4>
            <a href="{{ url()->previous() }}">
                &lt; Go Back
            </a>
        </h4>
        <article class="space-y-2 my-4">
            <figure>
                <img src="{{ $article->image }}"
                     alt="Article Image">
            </figure>

            <nav class="flex items-center justify-between">
                <x-category-badge :category_id="$article->category->id">
                    {{ $article->category->name }}
                </x-category-badge>

                <div class="space-x-1">
                    @foreach($article->tags as $tag)
                        <x-tag-badge :tagId="$tag->id">{{ $tag->name }}</x-tag-badge>
                    @endforeach
                </div>
            </nav>

            <h2 class="font-medium text-2xl">{{ $article->title }}</h2>

            <time pubdate class="text-gray-400 text-sm">{{ $article->created_at->diffForHumans() }}</time>

            <p>{{ $article->text }}</p>

        </article>
    </x-section>
</x-layout>
