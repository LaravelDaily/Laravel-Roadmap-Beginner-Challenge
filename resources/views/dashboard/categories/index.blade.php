<x-app-layout>
    <section class="container mx-auto pt-2 pb-20">
        <section class="border-b flex justify-between items-center text-gray-300">
            <h1 class="text-4xl">Categories</h1>
            <x-success-link href="{{ route('dashboard.categories.create') }}">create</x-success-link>
        </section>

        <section class="mt-10 overflow-x-scroll">
            <x-table :heads="['name', 'actions']">
                @foreach($categories as $category)
                    <x-table.tr>
                        <x-table.td>{{ str($category->name)->limit(30) }}</x-table.td>
                        <x-table.td>
                            <x-primary-link href="{{ route('dashboard.categories.edit', $category->id) }}">edit</x-primary-link>
                            <x-danger-button
                                type="button"
                                x-data=""
                                x-on:click.prevent="
                                    $dispatch('wants-to-be-delete',
                                        { id: '{{ $category->id }}', name: '{{ $category->name }}'}
                                    );
                                    $dispatch('open-modal', 'delete-category')"
                            >
                                delete
                            </x-danger-button>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>

            @if ($categories->isEmpty())
                <section class="text-white">no category found!</section>
            @endif
        </section>
        <section class="m-10">
            {{ $categories->links() }}
        </section>
    </section>

    <x-modal name="delete-category">
        <section
            class="p-5 text-white"
            x-data="{ name: 'the category', id: null }"
            x-on:wants-to-be-delete.window="name = $event.detail.name; id = $event.detail.id"
        >
            Are you sure want to delete
            <span x-text="name" class="text-green-300 text-lg"></span>?

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <form method="post" x-bind:action="'{{ route('dashboard.categories.destroy', ':id') }}'.replace(':id', id)">
                    @csrf @method('delete')
                    <x-danger-button class="ml-3">
                        delete category
                    </x-danger-button>
                </form>
            </div>
        </section>
    </x-modal>
</x-app-layout>
