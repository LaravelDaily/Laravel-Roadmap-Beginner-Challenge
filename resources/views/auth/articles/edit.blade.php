<x-app-layout>
    <x-form method="PATCH" action="{{ route('auth.articles.update', $article) }}" enctype="multipart/form-data">


        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="title">Titlte</label>
            <input class="border py-2 px-3 text-grey-800" type="text" name="title" id="title" value="{{ $article->title }}">
            @error('title')
            <p class="text-red-500 text-xs mt-2">
                {{ $message }}
            </p>
        @enderror
        </div>

        <div class="mb-6">
            <label class="block mb2 uppercase font-bold text-xs text-gray-700"
                for="body"
            >Body

            </label>

            <textarea class="border border-gray-400 p-2 w-full"
                name="body"
                id="body"
                cols="30"
                rows="10"
            >{{ $article->body }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        @if ($article->image)
            <div class="mb-6">
                <img  class="object-contain h-48 w-full" src="{{  asset('storage/' . $article->image) }}">
            </div>
        @endif

        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="image">File</label>
            <input class="border py-2 px-3 text-grey-800" type="file" name="image" id="image">
            @error('image')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">
                Submit
            </button>
        </div>
    </x-form>
</x-app-layout>