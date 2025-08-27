<x-pages.article.layout>

    <div class="ml-8">
        <article>
            <h2 class="font-semibold text-xl">{{$article->title}}</h2>
            <img src="{{asset($article->image)}}">
            <p>
                Category: {{$article->category->name}}
            </p>
            <p>Tags:
                @foreach ($article->tags as $tag)
                    {{$tag->name}}{{$loop->last ? '' : ', '}}
                @endforeach
            </p>
            <p class="mt-2">{{$article->full_text}}</p>
        </article>
    </div>

</x-pages.article.layout>
