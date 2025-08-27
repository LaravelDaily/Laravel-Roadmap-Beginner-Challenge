<x-app-layout>
    <div class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden font-bold text-3xl text-white ">
        Create Article
    </div>

    <x-form method="POST" action="{{ route('dashboard.articles.store') }}" enctype="multipart/form-data">
        <div class="flex flex-col mb-4">
            <x-label for="title" :value="__('Title')"/>
            <x-input id="title" class="border py-2 px-3 text-grey-800"
                type="text"
                name="title"
                value="{{ old('title') }}"
            />
            @error('title')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <x-label for="body" :value="__('Body')"/>
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
            <x-label for="image" :value="__('Upload Image')" />
            <x-input id="image" class="border py-2 px-3 text-grey-800"
                type="file"
                name="image"/>
            @error('image')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <x-button>
                Create
            </x-button>
        </div>
    </x-form>

    <div class="mb-6">
        <a href="{{ route('dashboard.articles.index') }}">
            <x-button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Articles' Index
            </x-button>
        </a>
    </div>
</x-app-layout>
