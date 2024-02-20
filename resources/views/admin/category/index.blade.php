<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Categories') }}
        </h2>

    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex-1 my-3 mb-4" >
                
            <x-text-input name="name"  placeholder="{{ __('New category') }}" class="mr-3 mb-4 flex-1" style="margin-right: 3rem"></x-text-input>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        
            <x-input-success :messages="session('status')" class="mt-2" />
            <x-primary-button class="flex-1 mt-4">{{ __('category') }}</x-primary-button>
            </div>
        </form>
        <div class="mt-6  shadow-sm rounded-lg">
            @foreach ($categorys as $category)
                <div class="p-6 bg-white mb-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-800">{{ $category->name }}</span>
                            </div>

                        <a href="{{ route('category.edit', $category) }}"
                            <x-secondary-button>Edit category</x-secondary-button>
                        </a>
                        <small class="ml-2 text-sm text-gray-600 float-end">{{ $category->created_at->format('j M Y, g:i a') }}</small>
                </div>
            @endforeach
        </div>
        {{ $categorys->links() }}
    </div>
</x-app-layout>