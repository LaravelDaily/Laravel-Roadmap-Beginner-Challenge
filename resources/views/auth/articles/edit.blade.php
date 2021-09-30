<x-app-layout>
    @if (session()->has('article.created'))
        <x-flash>
            {{ session('article.created') }}
        </x-flash>
    @endif
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
                <img  class="object-contain h-48 w-full" src="{{ asset('storage/' . $article->image) }}">
            </div>
        @endif

        <div class="inline-block relative w-64">
            <span class="text-gray-700">Categories</span>
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                @if ($article->category)
                    <option value="{{ $article->category->id }}" selected >{{ $article->category->name }}</option>
                @endif
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option disabled>No hay categorías disponibles</option>
                @endforelse
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="block">
            <span class="text-gray-700">Tags</span>
            <div class="mt-2">
                @foreach ($article->tags as $tag)
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" checked>
                            <span class="ml-2">{{ $tag->name }}</span>
                        </label>
                    </div>
                @endforeach
                @foreach ($tags as $tag)
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">{{ $tag->name}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="image">Update Image</label>
            <input class="border py-2 px-3 text-grey-800" type="file" name="image" id="image">
            @error('image')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">
                Update
            </button>
        </div>
    </x-form>
</x-app-layout>