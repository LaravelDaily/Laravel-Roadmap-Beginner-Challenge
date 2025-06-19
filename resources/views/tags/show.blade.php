<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show tag') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tag Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("View tag details below.") }}
                            </p>
                        </header>

                        <div class="mt-6">
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">ID</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $tag->id }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Title</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $tag->title }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $tag->created_at }}</dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Updated</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ $tag->updated_at }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center gap-4">
                                <x-primary-button>
                                    <a href="{{ route('tags.edit', $tag) }}">{{ __('Edit') }}</a>
                                </x-primary-button>
                                <form method="post" action="{{ route('tags.destroy', $tag) }}" class="inline">
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
