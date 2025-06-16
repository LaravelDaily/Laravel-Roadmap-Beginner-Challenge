<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation')
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg lg:w-[758px]">                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @error('image_edit_action')
                        <div class="text-red-600 text-sm dark:text-red-400">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <form 
                        action="{{ route('admin.articles.update', $article->id) }}" 
                        method="post"
                        class="flex flex-col"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="title" value="Title"></x-input-label>
                            <x-text-input 
                                name="title"
                                id="title"
                                type="text"
                                value="{{ old('title') === null ? $article->title : old('title') }}"
                                required
                                class="self-start w-full"
                            ></x-text-input>
                            @error('title')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="category" value="Select Article Category"></x-input-label>
                            
                            @if (count($categories) === 0)
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ __('No categories to display. Create some categories.') }}
                                </div> 
                                <a href="{{ route('category.index') }}">
                                    <x-primary-button type="button">
                                        Create Category
                                    </x-primary-button>
                                </a>
                            @else
                                <select 
                                    name="category" 
                                    id="category"
                                    required 
                                    class="self-start w-full"
                                >
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}"

                                            @if (old('category') === null)
                                                {{ $category->id === $article->category->id ? 'selected' : '' }}
                                            @else
                                                {{ $category->id === (int)old('category') ? 'selected' : '' }}
                                            @endif
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            @error('category')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label value="Select Tags"></x-input-label>

                            @if (count($tags) === 0)
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ __('No tags to display. Create some tags.') }}
                                </div>
                                <a href="{{ route('tag.index') }}">
                                    <x-primary-button type="button">
                                        Create Tag
                                    </x-primary-button>
                                </a>
                            @else
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li class="flex items-center gap-1">
                                            <input 
                                                name="tags[]"
                                                id="{{ 'tag-' . $tag->id }}"
                                                type="checkbox"
                                                class="self-start border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                value="{{ $tag->id }}"

                                                @if (count(old('tags', [])) === 0)
                                                    {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'checked' : '' }}
                                                @else
                                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                                @endif
                                            >
                                            <x-input-label 
                                                for="{{ 'tag-' . $tag->id }}" 
                                                value="{{ $tag->name }}"
                                            ></x-input-label>
                                        </li>    
                                    @endforeach
                                </ul>
                            @endif

                            @error('tags')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            @error('tags.*')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            @php
                                $imageUrl = '';
                                $imageEditAction = $article->image_edit_action === null ? 'keep' : $article->image_edit_action;
                                switch ($imageEditAction) {
                                    case 'keep':
                                        $imageUrl = $article->getFirstMediaUrl('article_images');
                                        break;

                                    case 'replace':
                                        $imageUrl = $article->getFirstMediaUrl('pending_article_images');
                                        break;

                                    case 'delete':
                                        $imageUrl = '';
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                };
                            @endphp

                            <div class="min-h-96 relative {{ $imageUrl === '' ? 'hidden' : '' }}">
                                <img 
                                    id="image-preview"
                                    src="{{ $imageUrl }}" 
                                    alt=""
                                    class="h-full w-full object-contain object-center"
                                >
                                <button 
                                    type="button"
                                    class="absolute right-0 top-0 w-9 h-9 bg-red-500 rounded-full p-1 border-2 border-black"
                                    x-data=""
                                    x-on:click="()=>{
                                        const imgInput = document.querySelector('#image')
                                        const imgPreview = document.querySelector('#image-preview')
                                        const imgPreviewParent = imgPreview.parentNode
                                        const imageEditAction = document.querySelector('#image_edit_action')

                                        imageEditAction.value = 'delete'
                                        imgInput.value = ''
                                        if(!imgPreviewParent.classList.contains('hidden'))
                                            imgPreviewParent.classList.toggle('hidden')
                                    }"
                                >
                                    <?xml version="1.0" ?>
                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <style>.cls-1{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:3px;}</style>
                                            </defs>
                                            <title/>
                                            <g id="cross">
                                                <line class="cls-1" x1="7" x2="25" y1="7" y2="25"/>
                                                <line class="cls-1" x1="7" x2="25" y1="25" y2="7"/>
                                            </g>
                                        </svg>
                                </button>
                                
                                <input 
                                    type="text" 
                                    name="image_edit_action" 
                                    id="image_edit_action"
                                    value="{{ $article->image_edit_action === null
                                        ? 'keep' : $article->image_edit_action }}"
                                    class="hidden"
                                >
                                
                            </div>
                            <x-input-label value="Change Image"></x-input-label>
                            <div class="flex justify-start space-x-2">
                                <x-text-input 
                                    name="image"
                                    id="image"
                                    type="file"
                                    class="self-start"
                                    x-data=""
                                    x-on:change="()=>{
                                        const imgInput = document.querySelector('#image')
                                        const imageEditAction = document.querySelector('#image_edit_action')
                                        const imgPreview = document.querySelector('#image-preview')
                                        const imgPreviewParent = imgPreview.parentNode

                                        const image = imgInput.files[0]
                                        imgPreview.src = URL.createObjectURL(image)
                                        imageEditAction.value = 'replace'

                                        if(imgPreviewParent.classList.contains('hidden')){
                                            imgPreviewParent.classList.toggle('hidden')
                                        }
                                    }"
                                ></x-text-input>

                                <div class="flex items-center space-x-2">
                                    {{-- Restore Original Image Btn --}}

                                    <button 
                                        type="button"
                                        x-data=""
                                        x-on:click="()=>{
                                            const imageEditAction = document.querySelector('#image_edit_action')
                                            const imageInputField = document.querySelector('#image')
                                            const imgPreview = document.querySelector('#image-preview')
                                            let imgUrl = '{{ $article->getFirstMediaUrl('article_images') }}'
                                            imageEditAction.value = 'keep'
                                            imageInputField.value = ''
                                            
                                            if( imgUrl.length !== 0 ){
                                                imgPreview.src = imgUrl
                                                if(imgPreview.parentNode.classList.contains('hidden')){
                                                    imgPreview.parentNode.classList.toggle('hidden')
                                                }
                                            } else {
                                                imgPreview.src = ''
                                                if(!imgPreview.parentNode.classList.contains('hidden')){
                                                    imgPreview.parentNode.classList.toggle('hidden')
                                                }
                                            }

                                        }"
                                    >
                                        <?xml version="1.0" ?>
                                        <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                            <svg enable-background="new 0 0 50 50" id="Layer_1" version="1.1" viewBox="0 0 50 50" height="30px" width="30px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect fill="none" height="50" width="50"/>
                                                <polyline fill="none" points="40,7 40,16   31,15.999 " stroke="#000000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4"/>
                                                <path d="M41.999,25  c0,9.39-7.61,17-17,17s-17-7.61-17-17s7.61-17,17-17c5.011,0,9.516,2.167,12.627,5.616c0.618,0.686,1.182,1.423,1.683,2.203" fill="none" stroke="#000000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4"/>
                                            </svg>
                                    </button>

                                    <span>
                                        Restore original image
                                    </span>
                                </div>
                            </div>
                            @error('image')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="pb-3 flex flex-col gap-1">
                            <x-input-label for="body" value="Body"></x-input-label>
                            <textarea 
                                name="body" 
                                id="body" 
                                cols="30" 
                                rows="10"
                                required
                                class="self-start rounded-lg w-full"
                            >{{ old('body') === null ? $article->body : old('body') }}</textarea>
                            @error('body')
                                <div class="text-red-600 text-sm dark:text-red-400 space-y-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <x-primary-button
                            class="self-start"
                        >
                            Update Article
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
