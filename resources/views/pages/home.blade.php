<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse($articles as $art)
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-full dark:text-gray-200">
                        <x-nav-link :href="route('article.show', $art)">
                            <h1 class="font-semibold text-xl">{{$art->title}}</h1>
                        </x-nav-link>
                        <h2>{{$art->category->name}} </h2>
                        <h2>Created at {{$art->created_at}} by {{$art->user->name}}</h2>
                    </div>
                </div>
            @empty
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-full dark:text-gray-200">
                        No articles added.                        
                    </div>
                </div>
            @endforelse

            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
