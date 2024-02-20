<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('category.update', $category) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex my-3" >
        <x-text-input name="name"  :value="old('name', $category->name)" placeholder="{{ __('category?') }}" class="mr-3 flex-1"></x-text-input>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <x-input-success :messages="session('status')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Edit category!') }}</x-primary-button>
    </form>
</div>
</x-app-layout>