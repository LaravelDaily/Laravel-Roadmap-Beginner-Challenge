<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            @foreach($posts as $post)
                <div class="bg-white w-3/4 p-3 mb-2 flex overflow-hidden shadow-sm sm:rounded-lg">
                    @if($post->image)
                        <img class="w-1/4 rounded mr-4" src="{{$post->imageUrl()}}" alt="{{$post->title}}">
                    @endif
                    <div class="flex-1">
                        <div class="flex mb-4 items-center">
                            <a href="{{ route('post.show', $post->id) }}" class="text-2xl mr-2 hover:text-blue-400">
                                <h1>{{$post->title}}</h1>
                            </a>
                            <div class="text-sm p-1 text-gray-500">{{$post->created_at->diffForHumans()}}</div>
                        </div>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
