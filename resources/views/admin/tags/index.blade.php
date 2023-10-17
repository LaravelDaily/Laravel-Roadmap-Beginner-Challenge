<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mt-5"><x-emeraldlink :href="route('admin.tags.create')">Create a Tag</x-link></div>
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold uppercase text-gray-700 bg-gray-100 border-b border-gray-200">id #</th>
                                <th class="px-6 py-4 text-sm font-semibold uppercase text-gray-700 bg-gray-100 border-b border-gray-200">Name</th>
                                <th class="px-6 py-4 text-sm font-semibold uppercase text-gray-700 bg-gray-100 border-b border-gray-200"># of articles</th>
                                <th class="px-6 py-4 text-sm font-semibold uppercase text-gray-700 bg-gray-100 border-b border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-2 border-b border-gray-200">{{ $tag->id }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">{{ $tag->name }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">{{ $tag->articles_count }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">
                                    <x-link :href="route('admin.tags.edit', $tag->id)">Edit</x-link>
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure of that?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <x-redbutton>Delete</x-redbutton>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="hover:bg-gray-50">
                                <td colspan=4 class="px-6 py-2 font-medium text-pink-950 border-b border-gray-200 italic">No Tags.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mx-3 mt-6 mb-0.5 font-martianmono font-light text-gray-900">{{ $tags->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>