<!--Nav-->
<nav class="bg-gray-800 p-2 mt-0 fixed w-full z-10 top-0">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="{{route('article.index')}}">
                <span class="text-2xl pl-2"><i class="em em-grinning"></i> Brand McBrandface</span>
            </a>
        </div>
        <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="{{route('article.index')}}">Home</a>
                </li>
                @auth
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                    href="{{route('category.index')}}">Categories</a>
                </li>
                @endauth
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="{{route('aboutme')}}">About me</a>
                </li>
                @auth
                <li class="mr-3">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6 ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4 flex items-center text-sm font-medium  hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                              this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Log in</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>