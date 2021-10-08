<x-app-layout>
    <div class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden font-bold text-3xl text-white ">
        Edit Tag
    </div>

    @if (session()->has('tag.created'))
        <x-flash>
            {{ session('tag.created') }}
        </x-flash>
    @endif
    @if (session()->has('tag.updated'))
        <x-flash>
            {{ session('tag.updated') }}
        </x-flash>
    @endif

    <x-form method="PATCH" action="{{ route('auth.tags.update', $tag) }}">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="name">Name</label>
            <input class="border py-2 px-3 text-grey-800" type="text" name="name" id="name" value="{{ old('name', $tag->name) }}">
            @error('name')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-indigo-400 text-white rounded py-2 px-4 hover:bg-indigo-500" type="submit">
                Edit
            </button>
        </div>
    </x-form>
    <div class="mb-6">
        <a href="{{ route('auth.tags.index') }}">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="button">Back to tags' index</button>
        </a>
    </div>
</x-app-layout>
