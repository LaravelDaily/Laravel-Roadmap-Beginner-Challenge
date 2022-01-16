<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="w-1/2 mx-auto">
                        <x-auth-validation-errors/>
                        <form method="POST" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-label for="title" :value="__('Title')"/>

                                <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                         :value="old('title', $post->title)" required
                                         autofocus/>
                            </div>

                            <div>
                                <x-label for="slug" :value="__('Slug')"/>

                                <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                         :value="old('slug', $post->slug)" required
                                         autofocus/>
                            </div>

                            <div>
                                <x-label for="excerpt" :value="__('Excerpt')"/>

                                <x-form.text-area id="excerpt" name="excerpt"
                                                  class="w-full">{{ old('excerpt', $post->excerpt) }}</x-form.text-area>

                            </div>

                            <div>
                                <x-label for="body" :value="__('Body')"/>

                                <x-form.text-area id="body" name="body"
                                                  class="w-full">{{ old('body', $post->body) }}</x-form.text-area>

                            </div>


                            <div>
                                <x-label for="category_id" :value="__('Category')"/>

                                <select name="category_id" id="category_id">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $category->id === old('category_id', $post->category->id)? 'selected' : '' }}> {{ ucwords($category->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-label for="tags" :value="__('Tags')"/>
                                <select name="tags[]" id="tags" multiple>
                                    @foreach(\App\Models\Tag::all() as $tag)
                                        <option
                                            value="{{ $tag->name }}"> {{ ucwords($tag->name) }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="flex items-center justify-end mt-4">

                                <x-button class="ml-3">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
