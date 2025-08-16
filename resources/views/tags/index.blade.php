<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <x-primary-button type="button" onClick="window.location.href = '{{route('tags.create')}}';">
                    {{ __('Add Tag') }}
                </x-primary-button>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 w-full">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Tag</th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300 text-right">Article Count</th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                        @foreach($tags as $tag)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $tag->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">{{ count($tag->articles) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300 text-center">
                                    <x-primary-button type="button" onClick="window.location.href = '{{route('tags.edit', $tag)}}';">Edit</x-primary-button>
                                    <form method="POST" action="{{ route('tags.destroy', $tag) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 d-flex justify-content-center"> {{ $tags->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
