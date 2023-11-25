<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('admin.article.update', $article->id)}}" enctype="multipart/form-data"
                          method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-6">
                            <label for="category"
                                   class="mb-2 text-sm font-medium text-gray-900 invalid after:content-['*'] after:ml-0.5 after:text-red-500 dark:text-white">Category:</label>
                            @error('category')<span
                                class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                            <select id="category" name="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="required">
                                @foreach($categories as $id => $category)
                                    <option
                                        @selected($id == $article->category->id) value="{{$id}}">{{$category}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>

                            @if(Storage::disk('public')->exists('article/images/'.$article->image))
                                <img class="h-auto max-w-lg mx-auto rounded-lg" width="300" height="300"
                                     src="{{asset('storage/article/images/' . $article->image)}}" alt="article image">
                            @else
                                <img class="h-auto max-w-lg mx-auto rounded-lg" src="{{asset('default.png')}}" alt="article image">
                            @endif
                            <span class="ml-1">Image:</span>
                            @error('image')<span
                                class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                            <div class="flex flex-col items-left justify-center pb-6">
                                <input name="image"
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       value="{{old('image')}}" aria-describedby="file_input_help"
                                       id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 ml-1" id="file_input_help">PNG,
                                    JPG
                                    or JPEG (MAX. Filesize: 2MB)</p>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="title"
                                       class="mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500 dark:text-white">Title:</label>
                                @error('title')<span
                                    class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                                <input type="text" id="title" name="title" value="{{$article->title}}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Please enter the title" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="slug"
                                       class="mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500 dark:text-white">Slug:</label>
                                @error('slug')<span
                                    class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                                <input type="text" id="slug" name="slug" value="{{$article->slug}}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Please enter the slug" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="content"
                                   class="mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500 dark:text-white">Content:</label>
                            @error('content')<span
                                class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                            <textarea id="content" required rows="4" name="content"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Please write the content here...">{{$article->content}}</textarea>
                        </div>
                        <div class="mb-6">
                            <h4 class="inline-block mb-2 text-gray-900 dark:text-white">Tag:</h4>
                            @error('tag')<span
                                class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{$message}}</span>@enderror
                            <div id="exampleWrapper" class="grid gap-6 md:grid-cols-7">
                                @forelse($tags as $id => $tag)
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="tag-checkbox-{{$loop->iteration}}" type="checkbox" value="{{$id}}"
                                               name="tag[]" @foreach($article->tags as $articleTag)
                                                   @checked($articleTag->id == $id)
                                               @endforeach
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tag-checkbox-{{$loop->iteration}}"
                                               class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tag}}</label>
                                    </div>
                                @empty
                                    <p>Tag was not created.</p>
                                @endforelse
                            </div>

                        </div>

                        <div class="text-right">
                            <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
