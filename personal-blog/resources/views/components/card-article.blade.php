<div class="flex flex-col justify-end max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @isset($article->image)
        <a href="{{ route('article.show',['article' => $article->id]) }}">
            <img class="rounded-t-lg" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" />
        </a>
    @endisset
    <div class="p-5">
        <div>
            <a href="{{ route('article.show',['article' => $article->id]) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate">
                {{ $article->body }}
            </p>
        </div>
        <div class="flex justify-between items-center">
            <a href="{{ route('article.show',['article' => $article->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $article->category->name }}</span>
        </div>
    </div>
</div>
