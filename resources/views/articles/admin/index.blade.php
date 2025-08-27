<x-app-layout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4 flex items-center justify-between">
              <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                  {{__('All articles')}}
                </h2>
              </div>
              <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <x-link :href="route('articles.create')" class="bg-green-500 hover:bg-green-700">Create</x-link>
              </div>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <table class="w-full text-left border-collapse">
              <thead>
                <tr>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    #
                  </th>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    IMG
                  </th>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    Title
                  </th>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    Category
                  </th>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    Tags
                  </th>
                  <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($articles as $index => $article)
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 border-b border-gray-200">{{ $index + 1 }}</td>
                  <td class="px-6 py-4 border-b border-gray-200">
                    <img class="h-20 w-20" src="/storage/uploads/{{$article->image_path}}" alt="" />
                  </td>
                  <td class="px-6 py-4 border-b border-gray-200">{{ $article->title }}</td>
                  <td class="px-6 py-4 border-b border-gray-200">
                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-green-600
                    rounded-full">{{ $article->category->name }}</span>
                  </td>
                  <td class="px-6 py-4 border-b border-gray-200">
                    @foreach ($article->tags as $tag)
                    <span
                      class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-gray-400 rounded-full">
                      {{ $tag->name }}
                    </span>
                    @endforeach
                  </td>
                  <td class="px-6 py-4 border-b border-gray-200">
                    <x-link href="{{ route('articles.edit', $article->id) }}" class="bg-blue-500 hover:bg-blue-700">
                      Edit
                    </x-link>
  
                    <form action="{{ route('articles.destroy', $article->id) }}" method="article"
                      onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <x-button class="bg-red-500 hover:bg-red-700">Delete</x-button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $articles->links() }}
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>