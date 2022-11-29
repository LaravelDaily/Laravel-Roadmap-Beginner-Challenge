<x-app-layout>
    <section class="container mx-auto pt-2 pb-20">
        <section class="border-b flex justify-between items-center text-gray-300">
            <h1 class="text-4xl">Your Articles</h1>
            <x-success-link href="{{ route('dashboard.articles.create') }}">create</x-success-link>
        </section>

        <section class="mt-10 overflow-x-scroll">
            <x-table :heads="['title', 'tags', 'categories', 'image', 'actions']">
                @foreach($articles as $article)
                    <x-table.tr>
                        <x-table.td>{{ str($article->title)->limit(30) }}</x-table.td>
                        <x-table.td>
                            @foreach($article->tags as $tag)
                                <x-badge>{{ $tag->name }}</x-badge>
                            @endforeach
                        </x-table.td>
                        <x-table.td>
                            @foreach($article->categories as $category)
                                <x-badge>{{ $category->name }}</x-badge>
                            @endforeach
                        </x-table.td>
                        <x-table.td>
                            <img class="w-10 h-10" src="{{ asset($article->image) }}"/>
                        </x-table.td>
                        <x-table.td>
                            <x-primary-link href="{{ route('dashboard.articles.edit', $article->id) }}">edit</x-primary-link>
                            <x-danger-button
                                type="button"
                                x-data=""
                                x-on:click.prevent="
                                    $dispatch('wants-to-be-delete',
                                        { id: '{{ $article->id }}', title: '{{ $article->title }}'}
                                    );
                                    $dispatch('open-modal', 'delete-article')"
                            >
                                delete
                            </x-danger-button>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>

            @if ($articles->isEmpty())
                <section class="text-white">no article found!</section>
            @endif
        </section>
        <section class="m-10">
            {{ $articles->links() }}
        </section>
    </section>

    <x-modal name="delete-article">
        <section
            class="p-5 text-white"
            x-data="{ title: 'the article', id: null }"
            x-on:wants-to-be-delete.window="title = $event.detail.title; id = $event.detail.id"
        >
            Are you sure want to delete
            <span x-text="title" class="text-green-300 text-lg"></span>?

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <form method="post" x-bind:action="'{{ route('dashboard.articles.destroy', ':id') }}'.replace(':id', id)">
                    @csrf @method('delete')
                    <x-danger-button class="ml-3">
                        delete article
                    </x-danger-button>
                </form>
            </div>
        </section>
    </x-modal>
</x-app-layout>
