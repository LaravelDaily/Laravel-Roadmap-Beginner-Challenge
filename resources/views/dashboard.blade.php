<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
        @foreach($articles->chunk(3) as $chunk)
        <section class="mx-auto max-w-7xl px-6 py-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($chunk as $article)
                        <article id="art-1" class="group overflow-hidden rounded-2xl border border-gray-800 bg-gray-900 hover:border-gray-700 transition  bg-white dark:bg-gray-800">
                            @isset($article->photo)
                                <img src="{{ Storage::disk('articles')->url($article->photo)}}" alt="Article cover" class="aspect-[16/9] w-full object-cover" />
                            @endisset
                            <div class="p-4">
                                <p class="text-xs text-gray-400">{{ $article->category->name }}</p>
                                @foreach($article->tags as $tag)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs text-white bg-slate-600 border border-slate-500/60 dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-500 dark:hover:bg-slate-700">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                                <h3 class="mt-1 text-lg font-semibold tracking-tight dark:text-white hover:underline"><a href="{{ route('dashboard.article', $article) }}"> {{ $article->title }} </a></h3>
                                <p class="mt-2 text-sm text-gray-300" style="white-space: pre-wrap;">{{ substr($article->article, 1, 400) . '...' }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
        </section>
        @endforeach
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center">
            <div class="flex justify-center flex-1"> {{-- Add justify-center here --}}
                {{$articles->links()}}
            </div>
        </nav>
    </div>
</x-app-layout>
