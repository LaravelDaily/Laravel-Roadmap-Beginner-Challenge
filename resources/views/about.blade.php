<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
                <div class="bg-white w-3/4 p-3 overflow-hidden shadow-sm sm:rounded-lg">
                   <h1 class="text-2xl">{{__('Laravel Roadmap Beginner Challenge')}}</h1>
                    <br>
                    <p>
                        {{ __('Thanks') }} <a class="text-blue-500 hover:text-blue-700 hover:underline" href="https://github.com/laravelDaily">LaravelDaily</a>
                    </p>
                </div>
        </div>
    </div>
</x-app-layout>
