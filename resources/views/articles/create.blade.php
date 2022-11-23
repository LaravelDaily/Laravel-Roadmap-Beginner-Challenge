<x-app-layout>
    <x-header text="Create New Articles"></x-header>
    <form action="{{ route('articles.store') }}" method="POST" class="w-full max-w-full" enctype="multipart/form-data">
        @csrf
        @include('articles._form-control', ['submit' => 'Create'])
    </form>
</x-app-layout>
