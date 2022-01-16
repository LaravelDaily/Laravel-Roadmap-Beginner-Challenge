<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-1/2 mx-auto">
                        <x-auth-validation-errors/>
                        <form method="POST" action="{{ route('tags.store') }}">
                            @csrf

                            <div>
                                <x-label for="name" :value="__('Name')"/>

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         :value="old('name')" required
                                         autofocus/>
                            </div>

                            <div>
                                <x-label for="slug" :value="__('Slug')"/>

                                <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                         :value="old('slug')" required
                                         autofocus/>
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Save') }}
                                </x-button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
