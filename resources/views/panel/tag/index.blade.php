<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="inline-block p-4 text-2xl">Tags Management</h1>
                <div class="float-right mt-4 mr-8">
                    <a href="{{ route('tags.create') }}" class="py-2 px-4 bg-green-400 text-white rounded-lg inline-block hover:bg-green-600">
                        Create New Tag
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
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created at
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tags as $tag)
                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 hover:text-blue-600">
                                                {{ $tag->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $tag->created_at->diffForHumans() }}
                                    </div>
                                </td>

                                <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <a href="{{ route('tags.edit', $tag->id) }}" class="hover:text-indigo-800">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a href="{{ route('tags.destroy', $tag->id)  }}" onclick="destroyTag(event, {{ $tag->id }})" class="hover:text-indigo-800">
                                        <i class="material-icons">delete</i>
                                    </a>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post" id="destroy-tag-{{ $tag->id }}">
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
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            function destroyTag(event, id) {
                event.preventDefault();
                document.getElementById('destroy-tag-' + id).submit();
            }
        </script>
    </x-slot>
</x-app-layout>
