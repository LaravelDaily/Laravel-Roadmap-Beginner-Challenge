<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mt-5"><x-emeraldlink :href="route('admin.categories.create')">Create a Category</x-link></div>
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
                            @forelse ($categories as $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-2 border-b border-gray-200">{{ $category->id }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">{{ $category->name }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">{{ $category->articles_count }}</td>
                                <td class="px-6 py-2 border-b border-gray-200">
                                    <x-link :href="route('admin.categories.edit', $category->id)">Edit</x-link>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                          onsubmit="return confirm('Are you 100% sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <x-redbutton>Delete</x-redbutton>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="hover:bg-gray-50">
                                <td colspan=4 class="px-6 py-2 font-medium text-pink-950 border-b border-gray-200 italic">No Categories.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mx-3 mt-6 mb-0.5 font-martianmono font-light text-gray-900">{{ $categories->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>