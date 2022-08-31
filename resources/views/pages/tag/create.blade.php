<x-pages.tag.layout>

    @error('name')
        <p>{{ $message }}</p>
    @enderror
    
    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input name="name" :value="old('name')" required autofocus />
        </div>

        <x-button class="ml-3">
            {{ __('Save') }}
        </x-button>
    </form>

</x-pages.tag.layout>