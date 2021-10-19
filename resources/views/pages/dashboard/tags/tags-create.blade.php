<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Tag') }}
        </h2>
    </x-slot>

    <div class="py-12 grid place-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('tag.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <input class="rounded" id="tag" type="text" name="tag" placeholder="Tag name">
                        @error('tag')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror

                        <button class="border p-2 bg-green-500 rounded text-white mt-2">Create new Tag</button>
                    </div>
            </form>

        </div>
    </div>
</x-app-layout>
