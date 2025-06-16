<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('admin.articles.create') }}">
                <x-primary-button >
                    Create Article
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <span class="inline-block bg-green-200 border border-green-600 mb-4 rounded-sm text-sm p-2 font-medium">
                    {{ session('success') }}
                </span>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">                
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    @if (count($articles) === 0)
                        {{ __("No articles to display.") }}
                    @else
                        <table class="w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                            <thead class="w-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm">
                                <tr>
                                    <th class="py-3 px-6 text-left">Article Name</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                    <th class="py-3 px-6 text-left"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-200 text-sm font-light">
                                @foreach ($articles as $article)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-6 text-left whitespace-nowrap font-medium">
                                            {{ $article->title }}
                                        </td>
                                        <td class="py-3 px-6 text-center flex space-x-2">
                                            <a href="{{ route('admin.articles.edit', $article->id) }}">
                                                <x-primary-button>
                                                    {{ __('Edit') }}
                                                </x-primary-button>
                                            </a>
                                            <form 
                                                action="{{ route('admin.articles.destroy', $article->id) }}"
                                                method="POST"
                                                class="inline-block"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('article.show', $article->id) }}">
                                                <x-primary-button class="whitespace-nowrap">
                                                    {{ __('View Blog') }}
                                                </x-primary-button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
