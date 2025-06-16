<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.guest-navigation')
    </x-slot>

    <div class="flex flex-col items-center sm:px-6 lg:px-8 lg:py-12">
        <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm sm:rounded-lg lg:w-[758px]">
            {{-- Hero Section --}}
            <section class="px-3 sm:px-6 lg:px-8 py-6 lg:py-12">
                <h1 class="roboto-regular text-3xl lg:text-5xl text-center">
                   {{ $article->title }} 
                </h1>
    
                <div class="flex justify-center mt-8">
                    @if(strlen($article->getFirstMediaUrl('article_images')) !== 0)
                        <div class="bg-red-400 lg:h-[32rem] w-full">
                            <img 
                                src="{{ $article->getFirstMediaUrl('article_images') }}" 
                                alt=""
                                class="w-full h-full object-cover object-center"
                            >
                        </div>
                    @endif
                </div>
                
                <p class="mt-8">
                    {!! nl2br($article->body) !!}
                </p>
            </section>
        </div>
    </div>
</x-app-layout>
