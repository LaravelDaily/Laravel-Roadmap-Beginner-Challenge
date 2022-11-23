<x-app-layout>
    <x-header text="Edit: {{ $tag->name }}"></x-header>
    <form action="{{ route('tags.update', $tag->slug) }}" method="POST" class="w-full max-w-full">
        @csrf
        @method('PUT')
        @include('tags._form-control', ['submit' => 'Update'])
    </form>
</x-app-layout>
