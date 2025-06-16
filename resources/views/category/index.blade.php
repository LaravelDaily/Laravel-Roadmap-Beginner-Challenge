<x-app-layout x-data="{
    categoryId: '',
    categoryName: '{{ old('name') }}',
}">
    <x-slot name="navigation">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Categories') }}
            </h2>
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-category')">
                Create Category
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <span class="inline-block bg-green-200 border border-green-600 mb-4 rounded-sm text-sm p-2 font-medium">
                    {{ session('success') }}
                </span>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($categories)
                        <table class="w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                            <thead class="w-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm">
                                <tr>
                                    <th class="py-3 px-6 text-left">Category Name</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-200 text-sm font-light">
                                @foreach ($categories as $category)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-6 text-left whitespace-nowrap font-medium">
                                            {{ ucfirst($category->name) }}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <x-primary-button 
                                                x-data="" 
                                                x-on:click.prevent="() => {
                                                    $dispatch('open-modal', 'update-category');
                                                    categoryName = '{{ $category->name }}';
                                                    categoryId = '{{ $category->id }}';
                                                }"
                                            >
                                                Edit
                                            </x-primary-button>
                                            <x-danger-button
                                                x-data="" 
                                                x-on:click.prevent="() => {
                                                    $dispatch('open-modal', 'destroy-category');
                                                    categoryName = '{{ $category->name }}';
                                                    categoryId = '{{ $category->id }}';
                                                }"
                                            >
                                                Delete
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        {{ __("No categories to display.") }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Create Category Form --}}
    <x-modal 
        name="create-category"
        :show="$errors->any()"
    >
        <div class="p-4">
            <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 pb-3">
                Add Category
            </h3>
            <form 
                action="{{ route('admin.category.store') }}" 
                method="post"
                class="flex flex-col items-center gap-2"
            >
                @csrf
                @method('POST')

                <x-text-input 
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    placeholder="Name"
                    required/>
                
                @error('name')
                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                        {{ $message }} 
                    </div>
                @enderror

                <x-primary-button>
                    Create Category
                </x-primary-button>
            </form>
        </div>
    </x-modal>

    {{-- Edit Category Form --}}
    <x-modal 
        name="update-category"
        :show="$errors->any()"
    >
        <div class="p-4">
            <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 pb-3">
                Edit Category
            </h3>
            <form 
                x-bind:action="`{{ route('admin.category.update', '') }}/${categoryId}`" 
                method="post"
                class="flex flex-col items-center gap-2"
            >
                @csrf
                @method('PUT')

                <x-text-input 
                    id="name"
                    name="name"
                    type="text"
                    x-bind:value="categoryName"
                    value="{{ old('name') }}"
                    placeholder="Name"
                    required/>
                
                @error('name')
                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                        {{ $message }} 
                    </div>
                @enderror

                <x-primary-button>
                    Save Category
                </x-primary-button>
            </form>
        </div>
    </x-modal>

    {{-- Delete Category Form --}}
    <x-modal 
        name="destroy-category"
        :show="$errors->any()"
    >
        <div class="p-4">
            <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 pb-3">
                Are you sure you want to delete category
            </h3>
            <form 
                x-bind:action="`{{ route('admin.category.destroy', '') }}/${categoryId}`" 
                method="post"
                class="flex flex-col items-center gap-2"
            >
                @csrf
                @method('DELETE')
                
                @if (false)
                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                        {{ __('Failed to delete category. Try again later') }} 
                    </div>
                @endif

                <x-danger-button>
                    Delete Category
                </x-danger-button>
            </form>
        </div>
    </x-modal>
</x-app-layout>
