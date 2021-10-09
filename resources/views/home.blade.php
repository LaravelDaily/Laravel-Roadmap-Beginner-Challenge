<x-app-layout>
    <div class="divide-y divide-gray-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Wassup!
            </h1>
            <p class="text-lg text-gray-500">All news about Brave Quesadillas Devs</p>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($articles as $article)
                <li class="py-12">
                    <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                        <dl>
                            <dd class="text-base font-medium text-gray-500">
                                <time>{{ $article->created_at->diffForHumans() }}</time>
                            </dd>
                        </dl>
                        <div class="space-y-5 xl:col-span-3">
                            <div class="space-y-6">
                                <div class="bg-green-500">
                                    <img class="object-contain h-48 w-full" @if ($article->image) src="{{ asset('storage/' . $article->image) }}" @endif>
                                </div>
                                <h2 class="text-2xl font-bold tracking-tight">
                                    <a class="text-gray-900" href="{{ $article->url }}">{{ $article->title}}</a>
                                </h2>
                                @if ($article->category)
                                    <span class="text-green-500"> {{ $article->category->name }}</span>
                                @endif
                                <div class="prose max-w-none text-gray-500">
                                    <div class="prose max-w-none">
                                        <p>
                                            {{ $article->excerpt }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-base font-medium"><a class="text-teal-600 hover:text-teal-700" href="{{ $article->url }}">Read more →</a>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        {{ $articles->links() }}
    </div>
</x-app-layout>
