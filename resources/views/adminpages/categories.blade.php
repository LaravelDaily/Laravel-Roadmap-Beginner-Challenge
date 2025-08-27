@php
    $searchQuery = request()->query('search');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>

        <form action="{{route('admin-page.categories')}}/?search=">

            <div class="flex py-2 justify-center">

                <x-text-input type="text" name="search"
                              class="h-14  pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                              placeholder="{{$searchQuery ?? 'Search for a category ...'}}"></x-text-input>

                <x-primary-button class="ml-3">
                    {{ __('Search') }}
                </x-primary-button>
            </div>

        </form>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Create a category') }}
                    </h2>

                    <form method="POST" action="{{ route('admin-page.categories.store') }}" class="py-4">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <div class="text-center pt-6 text-red-600 text-xl">
            @error('error')
            <p>{{$message}}</p>
            @enderror
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm  text-gray-500 dark:text-gray-400">

                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Category Id
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Created at
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        Updated at
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        Modify links
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr class="bg-white border-b  dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                            {{$category->id}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$category->name}}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{$category->created_at}}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{$category->updated_at}}
                                        </td>

                                        <td class="py-4 px-6 text-indigo-600">

                                            <form method="POST" action="{{route('admin-page.categories.delete', $category)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button>Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
