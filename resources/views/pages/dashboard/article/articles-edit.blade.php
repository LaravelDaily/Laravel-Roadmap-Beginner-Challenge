<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">{{ __('Dashboard ') }}</a>
            <span>\</span>
            <a href="{{ route('article_manager') }}">{{ __('Manage Articles ') }}</a>
            <span>\</span>
            <a href="{{ route('article_manager.edit', $article->id) }}">{{ __('Edit Article ') }}</a>
        </h2>
    </x-slot>

    <div class="py-12 grid place-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('article_manager.update', $article->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <input class="rounded" id="title" type="text" name="title" placeholder="Article title"
                            value="{{ $article->title }}">
                        @error('title')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-2">
                        <textarea class="rounded" name="full_text" id="full_text" cols="50" rows="10"
                            placeholder="Article Text"> {{ $article->full_text }}</textarea>
                        @error('full_text')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div class="flex justify-between flex-col   mt-2">
                            <label for="image">Choose an image for the article</label>
                            @error('image')
                                <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                            @enderror
                            <input class="ml-2" class="" type="file" name="image" id="image"
                                value="{{ $article->image }}">
                        </div>

                    </div>
                    @if (sizeof($categories) < 1)
                        <p>You have no one category yet, <a class="text-blue-500"
                                href="{{ route('category.create') }}">create new here</a></p>
                    @else
                        <div class="mt-2">
                            <label for="category">Select a Article Category</label>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    @if ($category->id == $article->category->id)
                                        <option value="{{ $category->id }}" default selected>{{ $category->name }}
                                        </option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @error('category_id')
                        <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                    @enderror


                    @if (sizeof($tags) < 1)
                        <p>You have no one tags yet,
                            <a class="text-blue-500" href="{{ route('tag.create') }}">create
                                new
                                here</a>
                        </p>
                    @else
                        <div class="flex flex-col mt-2">
                            <label for="tags">Tags available for the post</label>
                            <small>you have to select one or more.</small>
                            <select name="tags[]" id="tags" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @error('tags')
                        <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                    @enderror
                    <button class="border p-2 bg-green-500 rounded text-white mt-2">Edit Article</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
