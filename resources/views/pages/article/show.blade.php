<x-app-layout>
    <x-slot name="title">
        {{$art->title}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full dark:text-gray-200">
                    @if(Auth::check())
                        <x-nav-link :href="route('admin.article.edit', $art)">
                            <x-primary-button>
                                Edit
                            </x-primary-button>
                        </x-nav-link>
                        <form method="POST" action="{{ route('admin.article.destroy', $art) }}">
                            @csrf
                            @method('delete')
                            <x-primary-button class="bg-red-500">
                                Delete
                            </x-primary-button>
                        </form>
                    @endif
                    <h1 class="font-semibold text-3xl">{{$art->title}}</h1>
                    <br>
                    <p>Category: {{$art->category->name}}</p>
                    <p>Created at {{$art->created_at}} by {{$art->user->name}}</p>
                    <br>
                    {!! $art->text !!}
                    <br>
                    Tags:
                    @foreach($art->tags as $tag)
                        <x-secondary-button>#{{$tag->name}}</x-secondary-button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
