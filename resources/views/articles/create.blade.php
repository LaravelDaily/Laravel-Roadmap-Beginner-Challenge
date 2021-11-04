<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Article
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="image" class="block font-medium text-sm text-gray-700"></label>
                            <input type="file" name="image" id="image" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('image')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('title') }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="full_text" class="block font-medium text-sm text-gray-700">Full text</label>
                            <textarea name="full_text" id="full_text" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('full_text', '') }}</textarea> 
                            @error('full_text')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">Category</label>
                            <select name="category_id" id="category_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option></option>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}"{{ $id == old('category_id') ? ' selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                @foreach($tags as $id => $tag)
                                    <option value="{{ $id }}"{{ in_array($id, old('tags', [])) ? ' selected' : '' }}>{{ $tag }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('tags.*')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('articles.index') }}" class="inline-flex items-center bg-gray-200 hover:bg-gray-300 uppercase text-black font-bold py-2 px-4 rounded">{{ __('Cancel') }}</a>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>