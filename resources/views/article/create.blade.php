<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg lg:w-[758px]">                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form 
                        action="{{ route('admin.articles.store') }}" 
                        method="post"
                        class="flex flex-col"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('POST')

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="title" value="Title"></x-input-label>
                            <x-text-input 
                                name="title"
                                id="title"
                                type="text"
                                value="{{ old('title') }}"
                                required
                                class="self-start w-full"
                            ></x-text-input>
                            @error('title')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="category" value="Select Article Category"></x-input-label>
                            
                            @if (count($categories) === 0)
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ __('No categories to display. Create some categories.') }}
                                </div> 
                                <a href="{{ route('category.index') }}">
                                    <x-primary-button type="button">
                                        Create Category
                                    </x-primary-button>
                                </a>
                            @else
                                <select 
                                    name="category" 
                                    id="category"
                                    required 
                                    class="self-start w-full"
                                >
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}"
                                            {{ $category->id === (int)old('category') ? 'selected' : '' }}
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            @error('category')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label value="Select Tags"></x-input-label>

                            @if (count($tags) === 0)
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ __('No tags to display. Create some tags.') }}
                                </div>
                                <a href="{{ route('tag.index') }}">
                                    <x-primary-button type="button">
                                        Create Tag
                                    </x-primary-button>
                                </a>
                            @else
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li class="flex items-center gap-1">
                                            <input 
                                                name="tags[]"
                                                id="{{ 'tag-' . $tag->id }}"
                                                type="checkbox"
                                                class="self-start border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                            >
                                            <x-input-label 
                                                for="{{ 'tag-' . $tag->id }}" 
                                                value="{{ $tag->name }}"
                                            ></x-input-label>
                                        </li>    
                                    @endforeach
                                </ul>
                            @endif

                            @error('tags')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label value="Image"></x-input-label>
                            <x-text-input 
                                name="image"
                                id="image"
                                type="file"
                                class="self-start"
                            ></x-text-input>
                            @error('image')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="body" value="Body"></x-input-label>
                            <textarea 
                                name="body" 
                                id="body" 
                                cols="30" 
                                rows="10"
                                required
                                class="self-start rounded-lg w-full"
                            >{{ old('body') }}</textarea>
                            @error('body')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <x-primary-button
                            class="self-start"
                        >
                            Post Article
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
