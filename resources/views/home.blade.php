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
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>Beauti</span>
                            <span class="font-normal ml-auto">(12)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>business</span>
                            <span class="font-normal ml-auto">(15)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>fashion</span>
                            <span class="font-normal ml-auto">(5)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>food</span>
                            <span class="font-normal ml-auto">(10)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>learn</span>
                            <span class="font-normal ml-auto">(3)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>music</span>
                            <span class="font-normal ml-auto">(7)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>nature</span>
                            <span class="font-normal ml-auto">(0)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>people</span>
                            <span class="font-normal ml-auto">(13)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>sports</span>
                            <span class="font-normal ml-auto">(7)</span>
                        </a>
                        <a href="#" class="flex items-center hover:text-blue-500 transition">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>technology</span>
                            <span class="font-normal ml-auto">(17)</span>
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-sm p-4 mt-8">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Random Posts</h3>
                    <div class="space-y-4">
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="xl:w-6/12 lg:w-8/12 w-full lg:mx-6">
                <div class="flex justify-between bg-white px-3 py-2 items-center rounded-sm mb-5">
                    <h5 class="text-base uppercase font-semibold font-roboto">Business</h5>
                    <a href="#"
                        class="text-white bg-blue-500 px-3 py-1 rounded-sm uppercase text-sm hover:bg-transparent hover:text-blue-500 transition border border-blue-500">see
                        more</a>
                </div>

                <div class="bg-white shadow-sm rounded-sm">
                    <a href="#" class="overflow-hidden block">
                        <img src="https://via.placeholder.com/600x384"
                            class="w-full h-96 object-cover rounded transform hover:scale-110 transition duration-500"
                            alt="">
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h2
                                class="text-2xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus beatae officia
                                laudantium quis deleniti.
                            </h2>
                        </a>
                        <p class="text-gray-500 text-sm mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dolorem dolore tenetur.
                            Recusandae quisquam, voluptates numquam nisi itaque sapiente doloribus earum, natus
                            omnis nulla quam placeat porro et vel blanditiis.
                        </p>
                        <div class="flex mt-3 space-x-5">
                            <div class="flex items-center text-gray-400 text-sm">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-user"></i>
                                </span>
                                Blogging Tips
                            </div>
                            <div class="flex items-center text-gray-400 text-sm">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-clock"></i>
                                </span>
                                June 11,2022
                            </div>
                        </div>

                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-4 mt-4">
                    <div class="bg-white p-4 shadow-sm rounded-sm">
                        <a href="#" class="overflow-hidden block">
                            <img src="https://via.placeholder.com/268x240"
                                class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500"
                                alt="">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="text-xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </h2>
                            </a>
                            <div class="flex mt-2 space-x-5">
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    Blogging Tips
                                </div>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-sm">
                        <a href="#" class="overflow-hidden block">
                            <img src="https://via.placeholder.com/268x240"
                                class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500"
                                alt="">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="text-xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </h2>
                            </a>
                            <div class="flex mt-2 space-x-5">
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    Blogging Tips
                                </div>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-sm">
                        <a href="#" class="overflow-hidden block">
                            <img src="https://via.placeholder.com/268x240"
                                class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500"
                                alt="">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="text-xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </h2>
                            </a>
                            <div class="flex mt-2 space-x-5">
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    Blogging Tips
                                </div>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-sm">
                        <a href="#" class="overflow-hidden block">
                            <img src="https://via.placeholder.com/268x240"
                                class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500"
                                alt="">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="text-xl font-semibold text-gray-700 font-roboto hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </h2>
                            </a>
                            <div class="flex mt-2 space-x-5">
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    Blogging Tips
                                </div>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-3/12 lg:w-4/12 w-full mt-8 lg:mt-0">
                <div class="bg-white shadow-sm rounded-sm p-4">
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
                <div class="bg-white shadow-sm rounded-sm p-4 mt-8">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Populer Posts</h3>
                    <div class="space-y-4">
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/80x56" class="w-20 h-14 rounded object-cover"
                                    alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 font-roboto font-semibold group-hover:text-blue-500 transition">
                                    Lorem ipsum dolor sit amet consectetur.
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    June 11,2022
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-sm p-4 mt-8">
                    <h3 class="text-xl font-semibold text-gray-700 font-roboto mb-3">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Beauti</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Sports</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Business</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Politics</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Computer</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Coding</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Web</a>
                        <a href="#"
                            class="px-3 py-1 text-sm border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white transition">Web
                            App</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
