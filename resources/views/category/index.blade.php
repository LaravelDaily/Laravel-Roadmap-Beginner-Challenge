<x-master>
    <div class="overflow-x-auto shadow-md w-1/2 py-6 mx-auto">
        <a href="{{route('category.create')}}"
            class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
            NEW CATEGORY
        </a>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-b hover:bg-gray-300">
                    <td scope="row" class="px-6 py-4 text-gray-900">{{$category->name}}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('category.edit',[$category->id])}}"
                            class="text-orange-600 hover:underline">Edit</a>
                        <form action="{{route('category.destroy',[$category->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button><span class="text-red-600 hover:underline">Delete</span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{$categories->links()}}</div>
    </div>
    </x-maste>