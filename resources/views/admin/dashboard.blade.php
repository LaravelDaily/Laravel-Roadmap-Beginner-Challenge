<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $postsCount }}</h4>
                        <div class="text-gray-500">Posts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
