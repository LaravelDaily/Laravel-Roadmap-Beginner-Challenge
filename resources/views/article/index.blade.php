<x-master>
    <!-- component -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            @auth
            <a href="{{route('article.create')}}"
                class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                NEW POST
            </a>
            @endauth
            <div class="mb-12 space-y-2 text-center">
                <span
                    class="block w-max mx-auto px-3 py-1.5 border border-green-200 rounded-full bg-green-100 text-green-600">Blog</span>
                <h2 class="text-2xl text-cyan-900 font-bold md:text-4xl">Sharing is Caring</h2>
                <p class="lg:w-6/12 lg:mx-auto">Quam hic dolore cumque voluptate rerum beatae et quae, tempore sunt,
                    debitis dolorum officia aliquid explicabo? Excepturi, voluptate?</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($articles as $article)
                <div class="p-4 md:w-1/3">
                    <div
                        class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100"
                            src="{{ asset($article->file_path) }}" alt="blog">
                        <div class="p-6">
                            
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                @isset($article->category->name)
                                {{$article->category->name}}
                                @else
                                blog
                                @endisset
                            </h2>
                            <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{$article->title}}</h1>
                            {{-- <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings
                                jianbing microdosing tousled waistcoat.</p> --}}
                            <div class="flex items-center flex-wrap ">
                                <a href="{{route('article.show',$article->id)}}"
                                    class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">Learn
                                    more</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$articles->links()}}
        </div>
    </section>
</x-master>