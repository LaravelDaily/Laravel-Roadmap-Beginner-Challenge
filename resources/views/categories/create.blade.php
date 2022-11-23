<x-app-layout>
    <x-header text="Create New Category"></x-header>
    <form action="{{ route('categories.store') }}" method="POST" class="w-full max-w-full">
        @csrf
        @include('categories._form-control', ['submit' => 'Create'])
    </form>
</x-app-layout>
