<x-app-layout xmlns="http://www.w3.org/1999/html">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="max-w-md mx-auto" method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <br><br>
            Register Article
            <br><br><br>
            <div>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Title:</strong></label>
                <input type="text" name="title" id="title-input" class="bg-gray-50 border border-gray-300 text-gray-900
                text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                dark:focus:border-blue-500" placeholder="Title" required/>
            </div>

            <br>

            <div class="flex justify-between">
                <div class="w-2/3">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-black"><strong>Category:</strong></label>
                    <select id="categories" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500
                        block w-screen p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="">Select</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-4"></div>
                <div>
                    <label class="block mb-3 text-sm font-medium text-gray-900 dark:text-black"
                           for="large_size"><strong>Image Upload</strong></label>
                    <input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-bl-3xl cursor-pointer
                bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400" name="image" id="image" type="file">
                </div>
            </div>

            <br>

            <div>
                <label for="text-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Tag:</strong></label>
                <select name="tag_id[]" class="form-control" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <br>

            <div class="mb-5">
                <label for="text-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Article Text:</strong></label>
                <textarea id="text-input" name="full_text" rows="20" class="block p-2.5 w-full text-sm text-gray-900
            bg-gray-50
            rounded-lg
                 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                 dark:focus:border-blue-500" placeholder="Write here your article..." required></textarea>
            </div>
            <br>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('select').select2();
            $('.select2').css('width', '100%')
        });
    </script>
</x-app-layout>