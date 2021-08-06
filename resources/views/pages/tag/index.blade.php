<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tags') }}
            </h2>
            <a href="{{ route('tag.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                    <x-auth-session-status class="mb-4" :status="session('success')" />
                    @if($tags->count())
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('No.') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('Posts') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('Created') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach($tags as $tag)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$tag->name}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$tag->posts_count}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$tag->created_at->diffForHumans()}}
                                    </td>
                                    <td class="py-3 px-6 flex item-center justify-center">
                                        <a href="{{ route('tag.edit', $tag->id) }}" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('tag.destroy', $tag->id) }}" method="post" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="event.preventDefault();
                                                    this.closest('form').submit();" >
                                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $tags->links() }}
                    @else
                        <div>{{ __('No data found!') }}</div>
                    @endif
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
