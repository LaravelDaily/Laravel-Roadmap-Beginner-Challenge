<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Write an Article
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-label for="category_id">Category</x-label>
                            <select name="category_id" id="category_id" class="block w-full mt-1">
                                <option value="0">---  select a category  ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label class="block text-sm text-gray-600" for="title">Title</x-label>
                            <x-input id="title" class="block w-full mt-1" name="title" type="text" required value="{{ old('title') }}" />
                            @error('name')
                            <div class="text-sm font-medium text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="fulltext">Fulltext</x-label>
                            <textarea id="fulltext" class="block w-full mt-1" name="fulltext" rows="5" required>{{ old('fulltext') }}</textarea>
                            @error('fulltext')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="image">Image</x-label>
                            <x-input id="image" class="block w-full mt-1" name="image" type="file" />
                            @error('image')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="pb-1.5 text-sm">Tags</div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3">
                            @forelse ($allTags as $tag)
                            <div class="px-3 py-2 border border-gray-200 rounded-lg">
                                <input type="checkbox" class="mr-2" id="{{ 'tag' . $tag->id }}" name="{{ 'tag' . $tag->id }}" value="{{ $tag->id }}">
                                <label for="{{ 'tag' . $tag->id }}">{{ $tag->name }}</label>
                            </div>
                            @error('tag' . $tag->id)
                                <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                            @empty
                            @endforelse
                        </div>
                        <div class="mt-6">
                            <x-button>Create</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>