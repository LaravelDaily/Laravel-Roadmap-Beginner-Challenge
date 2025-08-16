<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($article->category->name . ' - ' . $article->title) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 overflow-x-auto">
                    @isset($article->photo)
                        <img src="{{ Storage::disk('articles')->url($article->photo)}}" alt="Article cover" class="aspect-[16/9] w-full object-cover" />
                    @endisset
                    <div class="p-2">
                        @foreach($article->tags as $tag)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs text-white bg-slate-600 border border-slate-500/60 dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-500 dark:hover:bg-slate-700">
                                        {{ $tag->name }}
                                    </span>
                        @endforeach
                    </div>
                    <div class="whitespace-break-spaces text-white" style="white-space: pre-wrap;">{{ $article->article }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
