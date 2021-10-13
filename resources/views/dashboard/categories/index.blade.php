<x-app-layout>
    <div class="w-full px-4 mx-auto mt-24 mb-12 xl:w-8/12 xl:mb-0">

        <x-flash />

        <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
            <a href="{{ route('dashboard') }}">
                <x-button>
                    Back to Dashboard index
                </x-button>
            </a>
        </div>
        <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg ">
            <div class="px-4 py-3 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                        <h3 class="text-base font-semibold text-blueGray-700">Categories</h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
                        <a href="{{ route('dashboard.categories.create') }}">
                            <x-button class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none">
                                Create
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse ">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Name
                            </th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Created At
                            </th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Edit
                            </th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 wditespace-nowrap text-blueGray-700 ">
                                    <p>{{ $category->name }}</p>
                                </th>
                                <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $category->created_at }}
                                </td>
                                <td class="p-4 px-6 text-xs border-t-0 border-l-0 border-r-0 align-center whitespace-nowrap">
                                    <a href="{{ route('dashboard.categories.edit', $category) }}">edit</a>
                                </td>
                                <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <x-form method="DELETE" action="{{ route('dashboard.categories.destroy', $category) }}">
                                        <div>
                                            <x-button>
                                                Delete
                                            </x-button>
                                        </div>
                                    </x-form>
                                </td>
                            </tr>
                        @empty
                            There aren't any categories, create one!
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout> 
