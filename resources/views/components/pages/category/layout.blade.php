<x-app-layout>
    <x-slot:header>
        <a class="mt-2" href="{{route('categories.create')}}">
            <x-button>Add A Category</x-button>
        </a>
    </x-slot>

    {{ $slot }}
</x-app-layout>