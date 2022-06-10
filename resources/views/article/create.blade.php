<x-master>
    <div class="w-1/2 mx-auto shadow-lg bg-white py-4 px-5 mt-2">
        <div class="font-sans">
            <p class="text-base md:text-sm text-green-500 font-bold flex justify-between">
                <a href="{{route('article.index')}}"
                    class="text-base md:text-sm text-blue-500 font-bold no-underline hover:underline">
                    &lt; BACK TO BLOG
                </a>
            </p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">Create Article
            </h1>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action='{{route('article.store')}}' enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="text-sm font-medium text-gray-900">Article Title:</label>
                <input type="text" id="title" name="title" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
            </div>
            <div class="mb-6">

                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                    text</label>
                <textarea id="text" name="text" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your text..."></textarea>

            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_path">Upload file</label>
                <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                    id="file_path" name="file_path" type="file">
            </div>

            <div class="mb-6">

                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Select an
                    option</label>
                <select id="category_id" name="category_id"
                    class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option selected="">Choose a category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-6">
                <label for="tags" class="text-sm font-medium text-gray-900">Tags:</label>
                <input placeholder="software development,cooking,sports" type="text" id="tag" name="tag" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                <small>separe tags with a comma</small>
            </div>

            <button type="submit"
                class="w-full px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Submit</button>
        </form>
    </div>
</x-master>