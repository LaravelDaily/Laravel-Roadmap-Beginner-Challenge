<x-app-layout>
    <div id="wrapper" class="max-w-xl px-4 py-4 mx-auto">
        <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
            <div id="jh-stats-positive"
                class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                <div>
                    <p class="text-3xl font-semibold text-center text-gray-800">{{$post_count}}</p>
                    <p class="text-lg text-center text-gray-500">Posts</p>
                </div>
            </div>

            <div class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                <div>
                    <p class="text-3xl font-semibold text-center text-gray-800">{{$category_count}}</p>
                    <p class="text-lg text-center text-gray-500">Categories</p>
                </div>
            </div>

            <div class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                <div>
                    <p class="text-3xl font-semibold text-center text-gray-800">{{$tag_count}}</p>
                    <p class="text-lg text-center text-gray-500">Tags</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>