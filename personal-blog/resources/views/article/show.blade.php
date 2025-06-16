@component('layouts.main')
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $article->user->name }}</p>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time datetime="{{ $article->created_at }}" title="{{ $formatedTime }}">{{ $formatedTime }}</time></p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $article->title }}
                </h1>
            </header>
            @isset($article->image)
                <img alt="Image Cover" src="{{ asset('storage/' . $article->image) }}" class="rounded"/>
            @endisset
           <p class="my-5 text-black dark:text-white">
               {{ $article->body }}
           </p>
            <hr>
            <p class="my-5 text-black dark:text-white">
               Category:
           </p>
            <span class="mb-5 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $article->category->name }}</span>

            @if($article->tags->count() > 0)
                <p class="my-5 text-black dark:text-white">
                    Tags:
                </p>
                @foreach($article->tags as $tag)
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $tag->name }}</span>
                @endforeach
            @endif
        </article>
    </div>
@endcomponent
