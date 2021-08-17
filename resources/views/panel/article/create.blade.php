<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-24">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-12 sm:p-6 bg-white">
                    <div class="mt-5 shadow md:mt-0 md:col-span-2">
                    @if(session('status'))
                        <div class="bg-green-100 border-t-4 border-gray-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class=""><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">{{ session('status') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                                Title
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" name="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Title...">
                                            </div>
                                            <div class="text-red-600 text-sm mt-1">
                                                @error('title')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2 ">
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                Category
                                            </label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <select type="text" name="category_id" class="category focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="text-red-600 text-sm mt-1">
                                                @error('category_id')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div>
                                        <label for="about" class="block text-sm font-medium text-gray-700">
                                            Content
                                        </label>
                                        <div class="mt-1">
                                            <textarea name="content" rows="6" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Type content here..."></textarea>
                                        </div>
                                        <div class="text-red-600 text-sm mt-1">
                                            @error('content')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2 ">
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                Image
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="file" name="img" class="focus:ring-indigo-500 bg-gray-50 shadow p-4 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Programming">
                                            </div>
                                            <div class="text-red-600 text-sm mt-1">
                                                @error('img')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2 ">
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                Tags
                                            </label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <select name="tags[]" class="tags focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" name="states[]" multiple="multiple">
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="text-red-600 text-sm mt-1">
                                                @error('tags[]')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('.tags').select2();
            });

            $(document).ready(function() {
                $('.category').select2();
            });
        </script>
    </x-slot>

</x-app-layout>
