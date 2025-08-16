<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Tags') }}
        </h2>

    </x-slot>
 
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('tag.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex-1 my-3 mb-4" >
                <x-text-input name="name"  placeholder="{{ __('New tag') }}" class="mr-3 mb-4 flex-1" style="margin-right: 3rem"></x-text-input>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-success :messages="session('status')" class="mt-2" />
                <x-primary-button class="flex-1 mt-4">{{ __('Tag') }}</x-primary-button>
            </div>
        </form>
         
        <div class="mt-6  shadow-sm rounded-lg">
            @foreach ($tags as $tag)
                <div class="p-6 bg-white mb-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-800">{{ $tag->name }}</span>
                            </div>

                        <a href="{{ route('tag.edit', $tag) }}"
                            <x-secondary-button>Edit tag</x-secondary-button>
                        </a>
                        <small class="ml-2 text-sm text-gray-600 float-end">{{ $tag->created_at->format('j M Y, g:i a') }}</small>
                </div>
            @endforeach
        </div>
        {{ $tags->links() }}
    </div>
</x-app-layout>