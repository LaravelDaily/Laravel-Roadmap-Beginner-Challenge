<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="inline-block p-4 text-2xl">Articles Management</h1>
                <div class="float-right mt-4 mr-8">
                    <a href="{{ route('articles.create') }}" class="py-2 px-4 bg-green-400 text-white rounded-lg inline-block hover:bg-green-600">
                        Create New Article
                    </a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <div x-data="{ show: true }" x-show="show"
                             x-transition:enter.duration.500ms
                             x-transition:leave.duration.1000ms
                             x-init="setTimeout(() => show = false, 3000)"
                             class="flex mb-3 justify-between items-center bg-green-300 relative text-white py-3 px-3 rounded-lg">
                            <div>
                                {{ session('status') }}
                            </div>
                            <div>
                                <button type="button" @click="show = false" class=" text-white">
                                    <span class="text-2xl">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <table class="min-w-full divide-y shadow divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Published
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($articles as $article)
                        <tr>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 hover:text-blue-600">
                                            <a href="{{ route('articles.show', $article->id) }}">
                                            {{$article->title}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $article->category->name }}
                                </div>
                            </td>
                            <td class="px-3 text-sm text-gray-500 py-4 whitespace-nowrap">
                                {{ $article->user->name }}
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $article->created_at->diffForHumans() }}
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">

                                <a href="{{ route('articles.edit', $article->id) }}" class="hover:text-indigo-800">
                                    <i class="material-icons">edit</i>
                                </a>

                                <a href="{{ route('articles.destroy', $article->id) }}" onclick="destroyPost(event, {{ $article->id }})" class="hover:text-indigo-800">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="post" id="destroy-article-{{ $article->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More people... -->
                        </tbody>
                    </table>
                    <div class="mt-4 mb-4 px-9">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            function destroyPost(event, id) {
                event.preventDefault();
                document.getElementById('destroy-article-' + id).submit();
            }
        </script>
    </x-slot>
</x-app-layout>
