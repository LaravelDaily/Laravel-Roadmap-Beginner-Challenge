<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Manage Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('category.create') }}">Create new Category</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="#">Edit Category</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="#">Delete Category</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
