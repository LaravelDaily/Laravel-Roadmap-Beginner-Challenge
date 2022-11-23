<x-app-layout>
    <x-header text="Create New Tag"></x-header>
    <form action="{{ route('tags.store') }}" method="POST" class="w-full max-w-full">
        @csrf
        @include('tags._form-control', ['submit' => 'Create'])
    </form>
</x-app-layout>
