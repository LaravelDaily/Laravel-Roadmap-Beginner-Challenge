<x-app-layout>
    <x-slot:header>
        @guest
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        @endguest
        @auth
            <a class="mt-2" href="{{route('articles.create')}}">
                <x-button>Create An Article</x-button>
            </a>
        @endauth
    </x-slot>

    {{ $slot }}
</x-app-layout>