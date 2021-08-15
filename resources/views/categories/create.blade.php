<x-app-layout>
    <div class="my-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-1/3  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Category') }}
                </h2>
            </x-slot>

            <form method="POST" action="{{ route('category.store') }}">
            @csrf
            @method('POST')
            <!-- Title -->
                <div >
                    <div class="w-full col-span-2">
                        <x-label for="name" :value="__('Name')"></x-label>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                 required
                                 autofocus></x-input>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
