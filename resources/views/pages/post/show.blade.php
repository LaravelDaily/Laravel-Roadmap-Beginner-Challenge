<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post - Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-3/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if($post->image)
                        <img class="w-full" src="{{$post->imageUrl()}}" alt="{{$post->title}}">
                        <br>
                  @endif
                  <h1 class="text-3xl"> {{$post->title}} </h1>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 mr-2">{{$post->created_at->diffForHumans()}}</span>
                        <div>
                            @foreach($post->tags as $tag)
                                <span class="text-xs bg-blue-400 text-white rounded-lg p-1 m-1"> {{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                      <br>
                    <p class="text-gray-800">{{$post->description}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
