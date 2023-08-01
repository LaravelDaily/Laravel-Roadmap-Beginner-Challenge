<x-app-layout>
    <x-slot name="title">
        Add New Category
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" value="Create category" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                Create
                            </x-primary-button>
                        </div>
                    </form>

                    <table class="border border-collapse border-slate-400 dark:text-gray-200 table-auto">
                        <thead class="border">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                                <tr class="border">
                                    <td>{{$loop->iteration}}.</td>
                                    <td id="category-{{$cat->id}}">{{$cat->name}}</td>
                                    <td><x-primary-button>Edit</x-primary-button></td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.category.destroy', $cat) }}">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button class="bg-red-500">
                                                Delete
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border">
                                    <td colspan="4">No categories added.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>