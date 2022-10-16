<x-app-layout>
    <div class="py-12 min-h-screen">
        <div class="container mx-auto px-4">

            <div class="flex justify-between mx-10">
                <h1 class="text-2xl font-semibold">
                    Create Post
                </h1>
            </div>
            <div class="overflow-x-auto flex items-center justify-center  mt-8 ">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Title :</label>
                                    <input type="text" placeholder="Post title" name="title" id="title"
                                        autocomplete="given-title"
                                        class="@error('title') border-red-600 @enderror mt-1 block  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('title')
                                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image
                                        :</label>
                                    <input
                                        class="@error('image') border-red-600 @enderror mt-1 block  rounded-md  border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm "
                                        id="image" name="image" type="file">
                                    @error('image')
                                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags
                                        :</label>
                                    <input type="text" placeholder="Post tags" name="tags" id="tags"
                                        value="{{ old('tags') }}" autocomplete="given-title"
                                        class="@error('tags') border-red-600 @enderror mt-1 block  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <span class="text-xs text-gray-400">Separated by comma</span>
                                    @error('tags')
                                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="category" class="block text-sm font-medium text-gray-700">Category
                                        :</label>
                                    <select name="category" id="category" autocomplete="given-title"
                                        class="@error('category') border-red-600 @enderror mt-1 block  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="#">--- SELECT CATEGORY ---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="post" class="block text-sm font-medium text-gray-700">
                                        Post :</label>
                                    <textarea type="text" placeholder="Post text" name="post" id="post" autocomplete="given-title"
                                        class="@error('post') border-red-600 @enderror mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                    @error('post')
                                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
