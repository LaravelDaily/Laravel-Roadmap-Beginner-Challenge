<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin-page.article.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')"/>

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                          value="{{$article->title}}" required autofocus></x-text-input>

                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>

                        <!-- Body -->
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Body')"/>

                            <x-text-input id="body" class="block mt-1 w-full" type="text" name="body"
                                          value="{{$article->body}}"></x-text-input>

                            <x-input-error :messages="$errors->get('body')" class="mt-2"/>
                        </div>


                        <div class="mt-4 flex">
                            <!-- Category -->
                            <div class="px-1">
                                <x-input-label for="category_id" :value="__('Category')" />

                                <select name="category_id" id="category_id" class="rounded-md shadow-sm border-gray-300
                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$article->category_id === $category->id ? 'selected' : null}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>
                        </div>


                        <!-- Tags -->
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Tags (separated by comma)')" />

                            <x-text-input id="body" class="block mt-1 w-full" type="text" name="tags" value="{{$tags}}"/>

                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />

                            <input id="image" class="border border-gray-200 rounded p-2 w-full" type="file" name="image" :value="old('image')"/>

                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
