<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- component -->
            <section class="container mx-auto p-6 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Words</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($articles as $article)

                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                     src="{{$article->image}}"
                                                     alt="" loading="lazy"/>
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                     aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{$article->title}}</p>
                                                <p class="text-xs text-gray-600">{{$article->tags_count}} {{Str::plural('tag',$article->tags_count)}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border">{{str_word_count($article->fulltext)}}</td>
                                    <td class="px-4 py-3 text-sm border">{{$article->created_at->format('d/m/Y H:i')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{$articles->links()}}</div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
