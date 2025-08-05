<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <a href="{{ route('category.create') }}" class="inline-block bg-green-500 text-white px-2 sm:px-4
                     py-1 sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">Register Category</a>
                    <a href="{{ route('category.index') }}" class="inline-block bg-blue-600 text-white px-2 sm:px-4
                    py-1 sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">List Category</a>
                    <a href="{{ route('tag.create') }}" class="inline-block bg-green-500 text-white px-2 sm:px-4 py-1
                     sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">Register Tag</a>
                    <a href="{{ route('tag.index') }}" class="inline-block bg-blue-600 text-white px-2 sm:px-4 py-1
                    sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">List Tag</a>
                    <a href="{{ route('article.create') }}" class="inline-block bg-green-500 text-white px-2 sm:px-4
                    py-1 sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">Register Article</a>
                    <a href="{{ route('article.index') }}" class="inline-block bg-blue-600 text-white px-2 sm:px-4
                    py-1 sm:py-2 rounded mr-2 sm:mr-4 mb-2 sm:mb-0">List Article</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
