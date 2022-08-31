<x-pages.category.layout>

    @error('name')
        <p>{{ $message }}</p>
    @enderror
    
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @method('PUT')
        @csrf

        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input name="name" :value="$category->name" required autofocus />
        </div>

        <x-button class="ml-3">
            {{ __('Save') }}
        </x-button>
    </form>

</x-pages.category.layout>