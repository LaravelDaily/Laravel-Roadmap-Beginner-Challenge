<x-app-layout>
    <div class="my-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-1/3  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __($category->name) }}
                </h2>
            </x-slot>

            <form method="POST" action="{{ route('category.update',$category->id) }}">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="w-full">
                        <x-label for="name" :value="__('Name')"></x-label>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name"
                                 required
                                 autofocus></x-input>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
            <hr class="m-2">
            <form method="POST" action="{{route('category.destroy',$category->id)}}">
                @csrf
                @method('DELETE')
                <x-button
                    class="bg-red-500 hover:bg-red-700 text-white"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    DELETE
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>
