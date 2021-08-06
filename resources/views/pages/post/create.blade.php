<x-app-layout>
    @section('style')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post - Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-2/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf
                        <x-label for="title" :value="__('Title')" />

                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <div class="mb-2"></div>
                        <x-label for="category_id" :value="__('Category')" />
                        <select name="category_id" required class="my-2 w-full border-gray-300 rounded px-3 py-2 outline-none">
                            @foreach($categories as $category)
                                <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{$category->id}}"> {{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <div class="mb-2"></div>
                        <x-label for="tag_ids" :value="__('Tags')" />
                        <select name="tag_ids[]" id="tag_ids" multiple class="block mt-1 w-full">
                            @foreach($tags as $tag)
                                <option {{ in_array($tag->id, old('tag_ids') ?? []) ? 'selected' : '' }} value="{{$tag->id}}"> {{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tag_ids') <div class="my-1 text-red-500">{{ $message }}</div> @enderror

                        <div class="mb-2"></div>
                        <x-label for="image" :value="__('Image')"/>
                        <x-input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image"  autofocus />
                        @error('image') <div class="my-1 text-red-500">{{ $message }}</div> @enderror

                        <div class="mb-2"></div>
                        <x-label for="description" :value="__('Discription')" />
                        <textarea name="description" class="my-2 w-full border-gray-300 rounded px-3 py-2 outline-none" cols="30" rows="5"> {{ old('description') }}</textarea>
                        @error('description') <div class="my-1 text-red-500">{{ $message }}</div> @enderror

                        <x-button class="mt-3" >
                            {{ __('Create') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
        <script>
            new SlimSelect({
                select: '#tag_ids'
            })
        </script>
    @endsection
</x-app-layout>
