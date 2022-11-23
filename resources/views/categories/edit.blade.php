<x-app-layout>
    <x-header text="Edit : {{ $category->name }}"></x-header>
    <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="w-full max-w-full">
        @csrf
        @method('PUT')
        @include('categories._form-control', ['submit' => 'Update'])
    </form>
</x-app-layout>
