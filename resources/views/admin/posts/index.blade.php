<x-app-layout>
    <div class="py-12 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="flex justify-between mx-10">
                <h1 class="text-2xl font-semibold">
                    Posts
                </h1>
                <a href="{{ route('posts.create') }}"
                    class="text-gray-900 cursor-pointer bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                    Create</a>
            </div>

            <div class="overflow-x-auto flex-col flex gap-8 items-center justify-center  mt-8 ">
                <table class=" w-6/12 text-sm text-center text-gray-500 shadow-md sm:rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Category
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $i => $post)
                            @php $Class_background = ($i % 2) === 0 ? 'bg-white' : 'bg-gray-50'; @endphp
                            <tr class="border-b {{ $Class_background }}">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $post->id }}
                                </th>
                                <td class="py-4   px-6">
                                    {{ $post->title }}
                                </td>
                                <td class="py-4   px-6">
                                    {{ $post->category->name }}
                                </td>

                                <td class="py-4 px-6">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="font-medium text-blue-600  hover:underline">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit"
                                            class="font-medium text-red-600 ml-2  hover:underline cursor-pointer"
                                            value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="w-6/12">
                    {{ $posts->links() }}
                </div>
            </div>



        </div>
    </div>
</x-app-layout>
