<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
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
