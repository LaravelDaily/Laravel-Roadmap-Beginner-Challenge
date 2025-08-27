
    @php
        $searchQuery = request()->query('search');
    @endphp

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin / Article list') }}
            </h2>

            <form action="{{route('admin-page.index')}}/?search=">

                <div class="flex py-2 justify-center">

                    <x-text-input type="text" name="search"
                                  class="h-14  pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                                  placeholder="{{$searchQuery ?? 'Search for an article ...'}}"></x-text-input>

                    <x-primary-button class="ml-3">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>

            </form>

        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Article Id
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Title
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Body
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Image
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Category
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    Tags
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    User Id
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Created at
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    Updated at
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    Modify links
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $article)
                                <tr class="bg-white border-b  dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$article->id}}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{$article->title}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$article->body}}
                                    </td>


                                    <td class="py-4 px-6">
                                        <img class="h-20 h-auto rounded-lg" src="{{ $article->image ? asset('storage/images/' . $article->image) : asset('images/no-image.png') }} " alt="" />
                                    </td>

                                    <td class="py-4 px-6">
                                        {{$article->category->name}}
                                    </td>

                                    <td class="py-4 px-6">
                                        @if(isset($article->tags))
                                            @foreach($article->tags as $tag)
                                                {{$tag->name}}
                                            @endforeach
                                        @endif
                                    </td>

                                    <td class="py-4 px-6">
                                        {{$article->user_id}}
                                    </td>

                                    <td class="py-4 px-6">
                                        {{$article->created_at}}
                                    </td>

                                    <td class="py-4 px-6">
                                        {{$article->updated_at}}
                                    </td>


                                    <td class="py-4 px-6 text-indigo-600">
                                        <a href="{{route('admin-page.article.edit', $article)}}">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{route('admin-page.article.delete', $article)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
