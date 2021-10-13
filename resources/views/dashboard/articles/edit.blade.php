<x-app-layout>
    <div class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden font-bold text-3xl text-white ">
        Edit Article
    </div>

    <x-flash />

    <x-form method="PATCH" action="{{ route('dashboard.articles.update', $article) }}" enctype="multipart/form-data">
        <div class="flex flex-col mb-4">
            <x-label for="title" :value="__('Title')"/>
            <x-input id="title" class="border py-2 px-3 text-grey-800"
                type="text"
                name="title"
                value="{{ old('title', $article->title) }}"
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
            >{{ old('body', $article->body) }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <span class="mb-2 font-bold text-lg text-gray-900">Categories</span>
            <select name="category_id" id="category_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                @if ($article->category)
                    <option value="{{ $article->category->id }}" selected >{{ $article->category->name }}</option>
                @else
                    <option disabled selected value></option>
                @endif
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option disabled>There aren't categories to select</option>
                @endforelse
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        @if ($article->tags->count())
            <div class="flex flex-col mb-4">
                <span class="mb-2 font-bold text-lg text-gray-900">Dettach Tag</span>
                <div class="mt-2">
                    @foreach ($article->tags as $tag)
                        <div>
                            <label class="inline-flex items-center">
                                <x-input type="checkbox" name="removed_tags[{{ $tag->id }}]" value="{{ $tag->id }}"/>
                                <span class="ml-2">{{ $tag->name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($tags->count())
            <div class="flex flex-col mb-4">
                <span class="mb-2 font-bold text-lg text-gray-900">Attach Tag</span>
                <div class="mt-2">
                    @foreach ($tags as $tag)
                        <div>
                            <label class="inline-flex items-center">
                                <x-input type="checkbox" name="added_tags[{{ $tag->id }}]" value="{{ $tag->id }}"/>
                                <span class="ml-2">{{ $tag->name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($article->image)
            <div class="flex flex-col mb-4">
                <img class="object-contain h-48 w-full" src="{{ asset('storage/' . $article->image) }}">
            </div>
        @endif

        <div class="flex flex-col mb-4">
            <x-label for="image" :value=" __('Update Image')" />
            <input class="border py-2 px-3 text-grey-800" type="file" name="image" id="image">
            @error('image')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <x-button>
                Update
            </x-button>
        </div>
    </x-form>
    <div class="mb-6">
        <a href="{{ route('dashboard.articles.index') }}">
            <x-button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Back to Articles' index
            </x-button>
        </a>
    </div>
</x-app-layout>
