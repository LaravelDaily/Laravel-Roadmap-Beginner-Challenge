<x-master>
    <div class="w-1/2 mx-auto shadow-lg bg-white py-4 px-5 mt-2">
        <div class="font-sans">
            <p class="text-base md:text-sm text-green-500 font-bold flex justify-between">
                <a href="{{route('article.show',$article->id)}}"
                    class="text-base md:text-sm text-blue-500 font-bold no-underline hover:underline">
                    &lt; BACK TO POST
                </a>
            </p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">Edit Article
            </h1>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!--detach tags-->
        <div class="mb-6 flex space-x-1 space-y-1">
            @foreach ($article->tags as $tag)
            <form method="post" action="{{route('tag.detach',[$article->id,$tag->id])}}">
                @csrf
                @method('DELETE')
                <span
                    class=" bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                    {{$tag->name}}
                    <button type="submit">
                        <svg class="h-5 w-5 text-blue-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </span>
            </form>
            @endforeach
        </div>
        <form method="post" action='{{route('article.update',[$article->id])}}' enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!--title-->
            <div class="mb-6">
                <label for="title" class="text-sm font-medium text-gray-900">Article Title:</label>
                <input value="{{$article->title}}" type="text" id="title" name="title"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
            </div>
            <!--text-->
            <div class="mb-6">

                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                    text</label>
                <textarea id="text" name="text" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your text...">{{$article->text}}</textarea>

            </div>
            <!--upload file-->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_path">Upload file</label>
                <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                    id="file_path" name="file_path" type="file">
            </div>
            <!--select categories-->
            <div class="mb-6">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Select an
                    option</label>
                <select id="category_id" name="category_id"
                    class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="{{$article->category_id}}" selected="">
                        @isset($article->category->name)
                        @else 
                        Select a Category 
                        @endisset
                    </option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <!--add tags-->
            <div class="mb-6">
                <label for="tags" class="text-sm font-medium text-gray-900">Add Tags:</label>
                <input placeholder="software development,cooking,sports" type="text" id="tag" name="tag"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                <small>separe tags with a comma</small>
            </div>

            <button type="submit"
                class="w-full px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Update</button>
        </form>

    </div>
</x-master>