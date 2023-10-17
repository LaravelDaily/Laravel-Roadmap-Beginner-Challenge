<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blogger's Home Page - Latest Articles
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($articles as $article)
                    <div class="block">
                        <h3 class="block mb-1.5 font-semibold text-gray-800 text-xl">
                            {{ $article->title }} 
                            <span class="px-3 py-1 font-medium text-xs bg-cyan-700 text-white rounded-full">{{ $article->category->name }}</span>
                        </h3>
                        <div class="mb-2">
                            @foreach ($article->tags as $tag)
                            <span class="px-2 py-1 text-xs bg-teal-700 text-gray-50 rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <table>
                            <tr>
                                @isset($article->image)
                                <td class="pr-4">
                                    <img src="{{ asset($article->image) }}" class="w-28 rounded-lg">
                                </td>
                                @endisset
                                <td>
                                    <p class="block text-base">
                                        {{ $article->start_fulltext }}
                                        &nbsp;&nbsp;
                                        <span class="text-sm italic text-gray-900 font-light whitespace-nowrap">{{ $article->created_at->format('d F Y') }}</span>
                                        &nbsp;&nbsp;
                                        <a href="{{ route('show-article', [ 'article_id' => $article->id ]) }}" 
                                            class="font-semibold text-cyan-800 hover:underline whitespace-nowrap">
                                            {{ $article->read_what }}
                                        </a>
                                        @auth
                                        &nbsp;&nbsp;
                                        <x-link :href="route('admin.articles.edit', $article->id)">Edit</x-link>
                                        @endauth
                                    </p>
                                </td>
                            </tr>
                        </table>
                        @if (!$loop->last)
                        <div class="h-5" />
                        @endif
                    </div>
                    @empty
                    <h3 class="text-xl font-bold text-pink-950">No Articles.</h3>
                    @endforelse
                    <div class="mx-3 mt-6 mb-0.5 font-martianmono font-light text-gray-900">{{ $articles->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>