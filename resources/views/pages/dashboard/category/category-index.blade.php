<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">{{ __('Dashboard ') }}</a>
            <span>\</span>
            <a href="{{ route('category.index') }}">{{ __('Manage Category ') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('category.create') }}" class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-200 border-b border-gray-200 text-center">
                    <strong>
                        Create new Category
                    </strong>
                </div>

            </a>
            <ul class="mt-10">
                @foreach ($categories as $category)
                    <li
                        class="py-6 pl-6 pr-14 bg-white border-b border-gray-200 rounded flex justify-between align-items-center">
                        <a href="{{ route('category.show', $category->id) }}"
                            class="text-blue-500">{{ $category->name }}</a>

                        <div class="flex ">
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="border py-1 px-3 bg-gray-700 text-white rounded mr-2">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="border py-1 px-3 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
