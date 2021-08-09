<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="mr-3 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tags') }}
            </h2>
            <x-nav-link :href="route('tag.create')" :active="request()->routeIs('tag.create')">
                {{ __('Create new Tag') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
                <!-- SMALL CARD ROUNDED -->
                @foreach($tags as $tag)
                    <div
                        class="bg-gray-100 border-{{$loop->even?'indigo':'red'}}-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-{{$loop->even?'indigo':'red'}}-400 dark:hover:bg-{{$loop->even?'indigo':'red'}}-600 hover:border-transparent | transition-colors duration-500">
                        <img class="w-16 h-16 object-cover rounded-3xl"
                             src="https://images.ctfassets.net/23aumh6u8s0i/7gu8qd0qzmuxWWjYLhZpqo/2bb8a206fe4a86af9414545b5c25c368/laravel"
                             alt=""/>
                        <div class="flex flex-col justify-center">
                            <p class="text-gray-900 dark:text-gray-300 font-semibold">{{$tag->name}}</p>
                            <p class="text-black dark:text-gray-100 text-justify font-semibold flex">
                            <div class="grid grid-cols-2">
                            <div class="w-full">
                                <form method="POST" action="{{route('tag.destroy',$tag->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="hover:text-yellow-700"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                                        </svg>
                                    </button>

                                </form>
                            </div>
                                <div class="w-full">
                                <a href="{{route('tag.edit',$tag->id)}}" class="hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>
                            </div>
                            </p>
                        </div>
                        </div>
                    </div>
            @endforeach
            <!-- END SMALL CARD ROUNDED -->

            </div>
            <div class="m-2">{{$tags->links()}}</div>
        </div>
    </div>
</x-app-layout>
