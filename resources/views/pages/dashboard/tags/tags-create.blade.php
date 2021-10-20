<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">{{ __('Dashboard ') }}</a>
            <span>\</span>
            <a href="{{ route('tag.create') }}">{{ __('Manage Tags ') }}</a>

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
        <ul class="mt-10 w-72">
            @foreach ($tags as $tag)
                <li
                    class="py-6 pl-6 pr-14 bg-white border-b border-gray-200 rounded flex justify-between align-items-center">
                    <a class="text-blue-500" href="{{ route('category.show', $tag->id) }}">{{ $tag->name }}</a>

                    <div class="flex ">
                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border py-1 px-3 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
