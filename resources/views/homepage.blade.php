<x-guest-layout>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

        <main class="mt-6">
            <div class="grid grid-cols-2 gap-4 mx-auto w-full sm:w-4/5 md:w-3/5 lg:w-1/2">
                @foreach ($articles as $article)
                    @include('articles.article-homepage', ['article' => $article])
                @endforeach
            </div>
        </main>


        <div class="mt-6 flex justify-center w-full">
            <br><br><br><br>
            {{ $articles->links() }}
        </div>

    </body>

</x-guest-layout>