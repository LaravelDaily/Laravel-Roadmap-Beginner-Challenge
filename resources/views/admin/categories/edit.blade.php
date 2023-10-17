<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update a Category
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="name"/>Name
                            <x-input id="name" class="block w-full mt-1" name="name" type="text" value="{{ $category->name }}" required/>
                            @error('name')
                            <div class="text-sm font-medium text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-button>Update</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>