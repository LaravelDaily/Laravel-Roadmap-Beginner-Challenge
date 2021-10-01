<x-app-layout>
    <div class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden font-bold text-3xl text-white ">
        Create Article
    </div>

    <x-form method="POST" action="{{ route('auth.articles.store') }}" enctype="multipart/form-data">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="title">Title</label>
            <input class="border py-2 px-3 text-grey-800" type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="body">
                Body
            </label>
            <textarea class="border border-gray-400 p-2 w-full"
                name="body"
                id="body"
                cols="30"
                rows="10"
            >{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="image">Upload Image</label>
            <input class="border py-2 px-3 text-grey-800" type="file" name="image" id="image">
            @error('image')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-indigo-400 text-white rounded py-2 px-4 hover:bg-indigo-500" type="submit">
                Create
            </button>
        </div>
    </x-form>
    <div class="mb-6">
        <a href="{{ route('auth.articles.index') }}">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="button">Back to Article's index</button>
        </a>
    </div>
</x-app-layout>