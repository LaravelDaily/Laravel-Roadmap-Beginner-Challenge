<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center justify-between pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Posts</h2>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="lg:ml-40 ml-10 space-x-8">
                                    <a href="{{ route('posts.create') }}"
                                       class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                        New Post
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                tags
                                            </th>

                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                category
                                            </th>

                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Actions
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($posts as $post)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            <img class="w-full h-full rounded-full"
                                                                 src="{{$post->image}}"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ $post->title }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        @foreach($post->tags as $tag)
                                                            <span class="ml-2">{{$tag->name}}</span>
                                                        @endforeach
                                                    </p>
                                                </td>

                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $post->category->name }}
                                                    </p>
                                                </td>


                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                    <a href="{{$post->path()}}/edit"
                                                       class="mr-2 bg-green-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                                        Edit
                                                    </a>
                                                    <button
                                                        class="mr-2 bg-red-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                                        Delete
                                                    </button>
                                                    <a href="{{$post->path()}}"
                                                       class="mr-2 bg-indigo-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                                        Show
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No posts yet</p>
                                        @endforelse
                                        </tbody>

                                    </table>
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
