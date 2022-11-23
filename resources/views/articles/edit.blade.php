<x-app-layout>
    <x-header text="Edit Article : {{ $article->title }}"></x-header>
    <form action="{{ route('articles.update', $article->slug) }}" method="POST" class="w-full max-w-full"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('articles._form-control', ['submit' => 'Update'])
    </form>
</x-app-layout>
