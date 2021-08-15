<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="mr-3 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <x-nav-link :href="route('category.create')" :active="request()->routeIs('category.create')">
                {{ __('Create new Category') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                <!--Card 1-->
                @foreach($categories as $category)
                    <div class="rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2"><a
                                 class=" hover:text-gray-500"   href="{{route('category.edit',$category->id)}}">{{$category->name}}</a></div>
                            <p class="text-gray-700 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla!
                                Maiores et perferendis eaque, exercitationem praesentium nihil.
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            @foreach($category->articles as $article)
                                <span
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-blue-700 mr-2 mb-2"><a
                                        href="{{route('article.show',$article->id)}}">{{$article->title}}</a></span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="m-2 p-2">{{$categories->links()}}</div>
    </div>
    </div>
</x-app-layout>
