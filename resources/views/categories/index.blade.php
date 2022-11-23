<x-app-layout>
    <x-header text="Categories">
        <x-anchor-button href="{{ route('categories.create') }}">New</x-anchor-button>
    </x-header>
    <table class="table-auto w-full mt-2">
        <thead>
            <tr class="border-b-2 border-gray-400">
                <th class="text-gray-900 py-2 font-semibold text-xl tracking-normal bg-gray-300/70 text-center">#
                </th>
                <th class="text-gray-900 py-2 font-semibold text-xl tracking-normal bg-gray-300/70 text-left">Name
                </th>
                <th class="text-gray-900 py-2 font-semibold text-xl tracking-normal bg-gray-300/70 text-left">Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr @class([
                    'border-b-2',
                    'bg-gray-100' => $loop->iteration % 2 == 0,
                    'bg-white' => $loop->iteration % 2 == 1,
                    'hover:bg-gray-200',
                ])>
                    <td class="text-gray-900 py-2 font-light text-md tracking-tight text-center">
                        {{ $categories->perPage() * ($categories->currentPage() - 1) + $loop->iteration }}
                    </td>
                    <td class="text-gray-900 py-2 font-light text-md tracking-tight text-left">{{ $category->name }}
                    </td>
                    <td class="text-gray-900 py-2 font-light text-md tracking-tight text-left">
                        <a href="{{ route('categories.edit', $category->slug) }}">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->slug) }}">
                            @csrf
                            @method('delete')
                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                Delete
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</x-app-layout>
