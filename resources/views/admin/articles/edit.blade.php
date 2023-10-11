<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit an Article
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <x-label for="category_id">Category</x-label>
                            <select name="category_id" id="category_id" class="block w-full mt-1">
                                <option value="0">---  select a category  ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        @selected(old('category_id', $article->category_id) == $category->id)
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label class="block text-sm text-gray-600" for="title">Title</x-label>
                            <x-input id="title" class="block w-full mt-1" name="title" type="text" required value="{{ old('title', $article->title) }}" />
                            @error('name')
                            <div class="text-sm font-medium text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="fulltext">Fulltext</x-label>
                            <textarea id="fulltext" class="block w-full mt-1" name="fulltext" rows="5" required>{{ old('fulltext', $article->fulltext) }}</textarea>
                            @error('fulltext')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 p-4 border border-gray-400 rounded-sm">
                            <table>
                                <tr>
                                    <td class="text-sm font-normal">Current image:</td>
                                    @isset($article->image)
                                    <td><img src="{{ asset($article->image) }}" width="100" height="75" class="ml-4"></td>
                                    @else
                                    <td class="text-sm font-light italic">None.</td>
                                    @endisset
                                </tr>
                            </table>
                            <x-label for="image">New Image:</x-label>
                            <x-input id="image" class="block w-full mt-1" name="image" type="file" value="{{ old('image') }}" />
                            @error('image')
                            <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                            @enderror
                            <div class="mt-1.5">
                                <input type="checkbox" class="mr-2" id=="image_confirmation" name="image_confirmation" value="1">
                                <label for=="image_confirmation" class="text-sm font-normal italic">Check this to confirm image insert/update/delete</label>
                            </div>
                        </div>
                        <div class="pb-1.5 text-sm">Tags</div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3">
                            @forelse ($allTags as $tag)
                            <div class="px-3 py-2 border border-gray-200 rounded-lg">
                                <input type="checkbox" 
                                    class="mr-2" 
                                    id="{{ 'tag' . $tag->id }}" 
                                    name="{{ 'tag' . $tag->id }}" 
                                    value="{{ $tag->id }}"
                                    @checked(in_array($tag->id, $tagIds))
                                >
                                <label for="{{ 'tag' . $tag->id }}">{{ $tag->name }}</label>
                                @error('tag' . $tag->id)
                                <span class="text-sm font-medium text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="mt-6">
                            <x-button>Update</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>