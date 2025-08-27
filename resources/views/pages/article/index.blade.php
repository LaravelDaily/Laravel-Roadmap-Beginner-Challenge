<x-app-layout>
    <x-slot name="title">
        Article List    
    </x-slot>    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-nav-link :href="route('admin.article.create')">
                <x-primary-button>
                    Create a New Article
                </x-primary-button>
            </x-nav-link>

            <table class="border border-collapse border-slate-400 dark:border-white dark:text-white table-auto">
                <thead class="border border-slate-400 dark:border-white">
                    <th class="" >No.</th>
                    <th >Title</th>
                    <th>Author</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse($articles as $art)
                        <tr class="border border-slate-400 dark:border-white">
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <x-nav-link :href="route('admin.article.show', $art)">
                                    <h1 class="font-semibold text-xl">{{$art->title}}</h1>
                                </x-nav-link>
                            </td>
                            <td>{{$art->user->name}}</td>
                            <td>{{$art->created_at}}</td>
                            <td>
                                <x-nav-link :href="route('admin.article.edit', $art)">
                                    <x-primary-button>
                                        Edit
                                    </x-primary-button>
                                </x-nav-link>
                                <form method="POST" action="{{ route('admin.article.destroy', $art) }}">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="bg-red-500">
                                        Delete
                                    </x-primary-button>
                                </form>
                            </td>    
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No articles added.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
