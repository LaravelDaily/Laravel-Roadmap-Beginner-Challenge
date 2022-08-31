<x-app-layout>
    <x-slot:header>
        <a class="mt-2" href="{{route('tags.create')}}">
            <x-button>Add A Tag</x-button>
        </a>    
    </x-slot>

    {{ $slot }}
</x-app-layout>