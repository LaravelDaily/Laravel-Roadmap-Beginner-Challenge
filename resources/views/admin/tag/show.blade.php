
<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 p-6 bg-white">
    <div class="flex justify-between items-center">
        <span class="text-gray-800">Tag:{{ $tag->name }}</span>
    </div>

    <small class="ml-2 text-sm text-gray-600 float-end">{{ $tag->created_at->format('j M Y, g:i a') }}</small>
    <x-input-success :messages="session('status')" class="mt-2" />
    @auth
    <a href="{{ route('tag.edit', $tag) }}"
    <x-secondary-button>Edit Tag</x-secondary-button>
    </a> 
    @endauth

</div>
</x-app-layout>