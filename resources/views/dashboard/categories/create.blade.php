<x-app-layout>
    <div class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden font-bold text-3xl text-white ">
        Create Category
    </div>

    <x-form method="POST" action="{{ route('dashboard.categories.store') }}">
        <div class="flex flex-col mb-4">
            <x-label for="name" :value="__('Name')"/>
            <x-input id="name" class="border py-2 px-3 text-grey-800"
                type="text"
                name="name"
                value="{{ old('name') }}"
            />
            @error('name')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <x-button>
                Create
            </x-button>
        </div>
    </x-form>
    <div class="mb-6">
        <a href="{{ route('dashboard.categories.index') }}">
            <x-button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Back to Categories' index
            </x-button>
        </a>
    </div>
</x-app-layout>
