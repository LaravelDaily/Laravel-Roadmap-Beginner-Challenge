<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container items-center px-5 py-12 lg:px-20">
                <div class="w-full mx-auto text-blueGray-500 border rounded-lg shadow-xl lg:w-1/2 hover:bg-blue-50 hover:scale-125" aria-hidden="false"
                     aria-describedby="modalDescription" role="dialog">
                    <div class="flex flex-col w-full p-10 mx-auto mb-12 text-left">
                        <h2 class="mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font">a great
                            header right here </h2>
                        <h1 class="mb-8 text-2xl font-semibold leading-none tracking-tighter text-black title-font"> A
                            {{$article->title}} </h1>
                        <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 ">{{$article->fulltext}}</p>
                        <div class="flex mt-4">
                            <a href="{{route('article.edit',$article->id)}}"
                                class="w-auto px-4 py-2 my-2 text-base font-medium text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
