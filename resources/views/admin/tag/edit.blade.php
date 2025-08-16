<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('tag.update', $tag) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex my-3" >
        <x-text-input name="name"  :value="old('name', $tag->name)" placeholder="{{ __('Tag?') }}" class="mr-3 flex-1"></x-text-input>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <x-input-success :messages="session('status')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Edit tag!') }}</x-primary-button>
    </form>
</div>
</x-app-layout>