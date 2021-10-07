<x-app-layout>
    <article class="xl:divide-y xl:divide-gray-200">
        <div class="space-y-1 text-center">
            <div class="bg-green-500">
                <img class="object-contain h-48 w-full" @if ($article->image) src="{{ asset('storage/' . $article->image) }}" @endif>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-5xl md:leading-[3.5rem]">{{ $article->title }}</h1>
                @if ($article->category)
                    <span class="text-green-500"> {{ $article->category->name }}</span>
                @endif
            </div>
        </div>
        <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20" style="grid-template-rows:auto 1fr">
            <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
                <dd>
                    <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                        <li class="flex items-center space-x-2">
                            <dl class="text-sm font-medium whitespace-no-wrap">
                                <dd class="text-gray-900">By {{ $article->user->name }}</dd>
                                <dd class="text-gray-900">
                                {{ $article->created_at->diffForHumans() }}
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>
            <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                <div class="max-w-none pt-10 pb-8">
                    <div class="prose max-w-none">
                        <p>
                            {{ $article->body }}
                        </p>
                    </div>
                </div>
                @foreach($article->tags as $tag)
                    <div
    class="ml-4 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full"
  >{{ $tag->name }}
                    </div>
                @endforeach
                <footer class="text-sm font-medium divide-y divide-gray-200 xl:col-start-1 xl:row-start-2">
                    <div class="pt-8"><a class="text-teal-600 hover:text-teal-700" href="/">
                        ← Back to the blog</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</x-app-layout>
