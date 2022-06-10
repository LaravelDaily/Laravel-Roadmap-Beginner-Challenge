<x-master>
    <div class="container px-5 py-16">
        <!--Title-->
        <div class="font-sans">
            <p class="text-base md:text-sm text-green-500 font-bold flex justify-between">
                <a href="{{route('article.index')}}"
                    class="text-base md:text-sm text-blue-500 font-bold no-underline hover:underline">
                    &lt; BACK TO BLOG
                </a>
                @auth
                <a href="{{route('article.edit',$article->id)}}"
                    class="text-base md:text-sm text-orange-500 font-bold no-underline hover:underline">
                    EDIT POST
                </a>
                @endauth
            </p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                {{$article->title}}
            </h1>
            <p class="text-sm md:text-base font-normal text-gray-600">{{'Published
                '.$article->created_at->format('d/m/Y')
                }}</p>
        </div>
        <img class="object-cover w-full h-40 my-2" src="{{ asset($article->file_path) }}">
        <!--Lead Para-->
        <p class="py-6">
            {{$article->text}}
        </p>
        <blockquote class="border-l-4 border-green-500 italic my-8 pl-8 md:pl-12">Example of blockquote - Lorem ipsum
            dolor
            sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
        </blockquote>
        <!--Tags -->
        <div class="text-base md:text-sm text-gray-500 px-4 py-6">
            Tags: @foreach ($article->tags as $tag)
            <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">{{$tag->name}}</a>
            @endforeach
        </div>

        @auth
        <form method="POST" action="{{route('article.destroy',$article->id)}}">
            @csrf
            @method('DELETE')
            <button class="text-base md:text-sm text-red-500 font-bold no-underline hover:underline">
                DELETE POST
            </button>
        </form>
        @endauth
    </div>
</x-master>