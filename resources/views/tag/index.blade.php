<x-app-layout x-data="{
    tagId : '{{ session()->has('current-tag-id') ? session('current-tag-id') : '' }}',
    tagName : '{{ old('name') }}',
    tagColor : ' {{ old('tag_color') ? old('tag_color') : __('#ffffff') }}'
}">
    <x-slot name="navigation">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tags') }}
            </h2>
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-tag')">
                Create Tag
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
                    @if ($tags)
                        <table class="w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                            <thead class="w-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm">
                                <tr>
                                    <th class="py-3 px-6 text-left">Tag Name</th>
                                    <th class="py-3 px-6 text-left">Tag Design</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-200 text-sm font-light">
                                @foreach ($tags as $tag)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-6 text-left whitespace-nowrap font-medium">
                                            {{ $tag->name }}
                                        </td>
                                        <td class="py-3 px-6 text-left whitespace-nowrap font-medium">
                                            <span 
                                                class="px-2 py-1 inline-flex justify-center rounded-3xl font-semibold"
                                                style="background-color: {{ $tag->tag_color }}"                                            
                                            >
                                                {{ $tag->name }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <x-primary-button
                                                x-data=""
                                                x-on:click.prevent="() => {
                                                    $dispatch('open-modal', 'edit-tag');
                                                    tagId = '{{ $tag->id }}'
                                                    tagName = '{{ $tag->name }}';
                                                    tagColor = '{{ $tag->tag_color }}';
                                                }"
                                            >
                                                Edit
                                            </x-primary-button>
                                            <x-danger-button
                                                x-data=""
                                                x-on:click.prevent="() => {
                                                    $dispatch('open-modal', 'destroy-tag');
                                                    tagId = '{{ $tag->id }}';
                                                    tagName = '{{ $tag->name }}';
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
                        {{ __("No tags to display.") }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Create Tag Form --}}
    <x-modal 
        name="create-tag" 
        :show="$errors->any() && (session('form') === 'tag.create')"
    >
        <div class="p-4">
            <h3 class="font-semibold text-lg text-start text-gray-800 dark:text-gray-200 pb-3">
                Create Tag
            </h3>
            <form 
                x-bind:action="`{{ route('admin.tag.store') }}`" 
                method="post"
                class="flex flex-col items-left gap-2"
            >
                @csrf
                @method('POST')
                
                <div class="flex flex-col gap-2">
                    <x-input-label value="Name"></x-input-label>

                    <x-text-input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="self-start"
                        value="{{ old('name') }}"
                        required
                    />

                    @error('name')
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1 self-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <x-input-label value="Tag Color"></x-input-label>

                    <x-text-input 
                        type="color" 
                        name="tag_color" 
                        id="tag_color"
                        x-bind:value="tagColor"
                        required
                    />

                    @error('tag_color')
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <x-primary-button class="self-start">
                    Create Tag
                </x-primary-button>
            </form>
        </div>
    </x-modal>

    {{-- Edit Tag Form --}}
    <x-modal 
        name="edit-tag" 
        :show="$errors->any() && (session('form') === 'tag.edit')"
    >
        <div class="p-4">
            <h3 class="font-semibold text-lg text-start text-gray-800 dark:text-gray-200 pb-3">
                Edit Tag
            </h3>
            <form 
                x-bind:action="`{{ route('admin.tag.update','') }}/${tagId}`"
                method="post"
                class="flex flex-col items-left gap-2"
            >
                @csrf
                @method('PUT')
                
                <div class="flex flex-col gap-2">
                    <x-input-label value="Name"></x-input-label>

                    <x-text-input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="self-start"
                        value="{{ old('name') }}"
                        x-bind:value="tagName"
                        required
                    />

                    @error('name')
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1 self-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <x-input-label value="Tag Color"></x-input-label>

                    <x-text-input 
                        type="color" 
                        name="tag_color" 
                        id="tag_color"
                        x-bind:value="tagColor"
                        required
                    />

                    @error('tag_color')
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <x-primary-button class="self-start">
                    Save Tag
                </x-primary-button>
            </form>
        </div>
    </x-modal>

    {{-- Delete Tag Form --}}
    <x-modal 
        name="destroy-tag"
        :show="$errors->any()"
    >
        <div class="p-4">
            <h3 
                class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 pb-3"
                x-text="`Are you sure you want to delete the ${tagName} tag`"
            ></h3>
            <form 
                x-bind:action="`{{ route('admin.tag.destroy', '') }}/${tagId}`" 
                method="post"
                class="flex flex-col items-center gap-2"
            >
                @csrf
                @method('DELETE')
                
                @if (false)
                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
                        {{ __('Failed to delete tag. Try again later') }} 
                    </div>
                @endif

                <x-danger-button>
                    Delete Tag
                </x-danger-button>
            </form>
        </div>
    </x-modal>
</x-app-layout>
