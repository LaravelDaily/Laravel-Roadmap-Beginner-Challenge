<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-black-800 leading-tight">
            {{ strtoupper($article->title) }} 
        </h1>
    </x-slot>    
    <form 
        action="{{ route('admin.articles.update', $article) }}"
        method="POST" 
        enctype="multipart/form-data"
        >
        @csrf
        @method('PUT')       
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @error('name')
                    <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                    @enderror                
                    <div class="grid grid-cols-12 gap-3">                    
                        <div class="col-span-1 text-right">
                            <label class="font-bold" for="title">
                                Title:
                            </label>                            
                        </div>
                        <div class="col-span-6">
                            <input 
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-full
                            placeholder-gray-600"
                            name="title"
                            value = "{{ $article->title }}">
                        </div>                  
                        <div class="col-span-1 text-right">
                            <label class="font-bold" for="category_id">
                                Category:
                            </label>
                        </div>
                        <div class="col-span-4">
                            <select name="category_id">
                                @forelse ($categories as $category )
                                    <option value="{{ $category->id }}"
                                    @if($category->id === $article->category_id)
                                        selected
                                    @endif
                                        >{{ $category->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-3">                    
                        <div class="col-span-1 text-right">
                            <label class="font-bold" for="image">
                                Image:
                            </label>                            
                        </div>
                        <div class="col-span-6">
                            <input 
                            type="file"
                            class="block shadow-5xl mb-10 p-2 w-full
                            placeholder-gray-600"
                            name="image"
                            value = "">
                        </div>
                    </div>               
                    <div class="grid grid-cols-12 gap-3">                    
                        <div class="col-span-1 text-right">
                            <label class="font-bold" for="tags">
                                Tags:
                            </label>                            
                        </div>
                        <div class="col-span-6">
                            <x-input id="tags" class="block w-full mt-1" name="tags" type="text" value="{{ old('tags', $tags) }}"/>
                            <span class="text-xs text-gray-400">Separated by comma</span>
                            @error('tags')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-3" >
                       <div class="col-span-1 text-right">
                            <label class="font-bold" for="text">
                                Text:
                            </label> 
                        </div>
                        <div class="col-span-11 row-span-3 ">                    
                            <textarea 
                                class="block shadow-5xl mb-10 p-2 w-4/5
                                placeholder-gray-400"
                                name="text"
                                rows="9" cols="50"
                            >
                                {{ $article->text }}
                            </textarea>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-3 text-center" >
                        <div class="col-span-4"></div>
                        <div class="col-span-4 text-center">
                            <x-button type="submit"
                            class="bg-green-500 block shadow-5xl mb-10 
                            p-2 w-80 uyppercase font-bold">
                                Save
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
