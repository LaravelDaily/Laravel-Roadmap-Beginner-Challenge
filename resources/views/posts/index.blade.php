<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>

            {{-- search --}}
            <div class="container flex mx-auto justify-end">
                <div>
                    <form action="/" method="GET" class="flex border-2 rounded">

                        <button class="flex items-center justify-center px-4 border-r">
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </button>

                        <input type="text" name="search" value="{{ request('search') }}" class="px-4 py-2 w-80"
                               placeholder="Search...">

                    </form>
                </div>
            </div>

        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 border-b border-gray-200 bg-white">

                    @forelse ($posts as $post)
                        <x-post-card :post="$post"/>
                    @empty
                        <p>No Post Yet</p>
                    @endforelse
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
