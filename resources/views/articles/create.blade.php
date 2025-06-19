<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Article Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Input article details below.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('articles.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="content" :value="__('Content')" />
                                <textarea id="content" name="content" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" required>{{ old('content') }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                            <div>
                                <x-input-label for="category_id" :value="__('Category')" />
                                <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">{{ __('Select a category') }}</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>

                            <div>
                                <x-input-label for="tags_ids" :value="__('Tags')" />
                                <div class="flex gap-2">
                                    <select multiple id="tags_ids" name="tags_ids[]" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @if($tags)
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags_ids', [])) ? 'selected' : '' }}>
                                                    {{ $tag->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <button type="button" onclick="clearTags()" class="mt-1 px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-sm">
                                        {{ __('Clear') }}
                                    </button>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('tags_ids')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
