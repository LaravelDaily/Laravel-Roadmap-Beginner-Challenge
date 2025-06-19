<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show article') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Article Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("View article details below.") }}
                            </p>
                        </header>

                        <div class="mt-6">
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">ID</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $article->id }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Title</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $article->title }}</dd>
                                        </div>
                                        
                                        <div class="sm:col-span-2">
                                            <dt class="text-sm font-medium text-gray-500">Image</dt>
                                            @if($article->image)
                                                <dd class="mt-1">
                                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="max-w-full h-auto rounded-lg shadow-md">
                                                </dd>
                                            @else
                                                <dd class="mt-1 text-sm text-gray-500">No image</dd>
                                            @endif
                                        </div>
                                        
                                        <div class="sm:col-span-2">
                                            <dt class="text-sm font-medium text-gray-500">Content</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $article->content }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Category</dt>
                                            @if($article->category)
                                                <dd class="mt-1 text-sm text-gray-900">
                                                    <span class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full">
                                                        {{ $article->category->title }}
                                                    </span>
                                                </dd>
                                            @else
                                                <dd class="mt-1 text-sm text-gray-500">No category</dd>
                                            @endif
                                        </div>
                                        <div class="sm:col-span-2">
                                            <dt class="text-sm font-medium text-gray-500">Tags</dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if($article->tags->count() > 0)
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($article->tags as $tag)
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                {{ $tag->title }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-gray-500">{{ __('No tags') }}</span>
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $article->created_at }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Updated</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $article->updated_at }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center gap-4">
                                <x-primary-button>
                                    <a href="{{ route('articles.edit', $article) }}">{{ __('Edit') }}</a>
                                </x-primary-button>
                                <form method="post" action="{{ route('articles.destroy', $article) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <x-danger-button onclick="return confirm('Are you sure?')">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
