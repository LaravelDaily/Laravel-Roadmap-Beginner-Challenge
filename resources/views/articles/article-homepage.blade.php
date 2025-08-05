<div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow
dark:bg-gray-800 dark:border-gray-700">

    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover rounded">
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($article->full_text, 100) }}</p>
        <a href="{{ route('article.show', $article) }}"
           class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>


{{--
<div class="flex justify-center">
    <div class="bg-white border-2 border-gray-300 p-6 rounded-lg m-6 w-96 shadow-lg">
        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover rounded">
        <!-- Aumente o valor de h-64 para h-96 -->
        <div class="p-6 text-black">
            <h2 class="font-bold text-xl mb-2">{{ $article->title }}</h2>
            <p class="text-base">{{ Str::limit($article->content, 100) }}</p>
            <a href="{{ route('articles.show', $article) }}"
               class="text-indigo-500 hover:text-indigo-800 mt-4 inline-block">Read</a>
        </div>
    </div>
</div>
--}}


