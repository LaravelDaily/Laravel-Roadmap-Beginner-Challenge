<x-app-layout>
    {{-- <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Home') }}
      </h2>
    </x-slot> --}}
    <div class="py-12 min-h-screen">
        <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
            <div class="xl:w-3/12 lg:w-4/12  w-full mb-8 lg:mb-8">
                <div class="bg-white shadow-sm rounded-sm p-4">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Categories</h3>
                    <div class="text-gray-700 space-y-2 font-semibold uppercase text-sm">
                        @foreach ($categories as $category)
                            <a href="{{ route('showByCategoriesId', ['categoryId' => $category->id]) }}"
                                class="flex items-center hover:text-blue-500 transition">
                                <span class="mr-2">
                                    <i class="far fa-folder-open"></i>
                                </span>
                                <span>{{ $category->name }}</span>
                                <span class="font-normal ml-auto">({{ $category->posts->count() }})</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-sm p-4 mt-8">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Random Posts</h3>
                    <div class="space-y-4">
                        @foreach ($randomPosts as $randomPost)
                            <a href="{{ route('post', $randomPost->id) }}" class="flex group">
                                <div class="flex-shrink-0">
                                    <img src={{ asset('storage/uploads/' . $randomPost->image) }}
                                        class="w-20 h-14 rounded object-cover" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h5
                                        class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                        {{ $randomPost->title }}
                                    </h5>
                                    <div class="flex text-gray-400 text-sm items-center">
                                        <span class="mr-1 text-xs">
                                            <i class="far fa-clock"></i>
                                        </span>
                                        {{ date('M d, Y', strtotime($randomPost->created_at)) }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="xl:w-6/12 lg:w-8/12 w-full lg:mx-6 ">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-sm rounded-sm mb-4">
                        <a href="#" class="overflow-hidden block">
                            <img src={{ asset('storage/uploads/' . $post->image) }}
                                class="w-full h-96 object-cover rounded transform hover:scale-110 transition duration-500"
                                alt="">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('post', $post->id) }}">
                                <h2
                                    class="text-2xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                    {{ $post->title }}
                                </h2>
                            </a>
                            <p class="text-gray-500 text-sm mt-2">
                                {{ $post->post }}
                            </p>
                            <div class="flex mt-3 space-x-5">
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    {{ $post->category->name }}
                                </div>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    {{ date('M d, Y', strtotime($post->created_at)) }}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}

            </div>
            <div class="xl:w-3/12 lg:w-4/12 w-full mt-8 lg:mt-0">


                <div class="bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <a href="{{ route('showByTagName', ['tagName' => $tag->name]) }}"
                                class="px-3 py-1 text-sm border border-gray-200 
                        rounded-sm hover:bg-blue-500 hover:text-white transition">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-sm p-4 mt-8">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Social Plugin</h3>
                    <div class="flex gap-2">
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
