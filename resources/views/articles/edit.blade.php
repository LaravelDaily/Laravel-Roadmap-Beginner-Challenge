<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $article->title) }}" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="p-4">
                            <x-input-label for="category" :value="__('Category')"/>
                            <x-select-input id="category" class="block mt-1 w-full" name="category" required
                                            :options="$categories"
                                            :selected="old('category', $article->category_id)"
                            />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="p-4">
                            <x-input-label for="photo" value="{{ $article->photo !== null ? 'Photo Current - ' . $article->photo : 'Photo' }}" />
                            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>
                        <div class="p-4">
                            <x-input-label for="tags" :value="__('Tags')"/>
                            <x-select-input id="tags" class="block mt-1 w-full" name="tags[]" multiple="multiple" size="{{ count($tags) }}"
                                            :options="$tags"
                                            :selected="old('tags', $article->tags->pluck('id')->toArray())"
                            />
                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>
                        <div class="p-4">
                            <x-input-label for="article" :value="__('Article')" />
                            <x-text-area id="article" class="block mt-1 w-full" rows="15" name="article" required value="{{ old('article', $article->article) }}"/>
                            <x-input-error :messages="$errors->get('article')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4 p-4">
                            <x-primary-button class="ms-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
