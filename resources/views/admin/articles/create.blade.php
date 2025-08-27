<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-black-800 leading-tight">
            New Article
        </h1>
    </x-slot>    
    <form 
        action="{{ route('admin.articles.store') }}"
        method="POST" 
        enctype="multipart/form-data"
        >
        @csrf 
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-1"></div>
                            <div class="alert alert-danger col-span-6 text-red-800">
                                <p class="text-left font-bold">
                                    {{ $error }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif                
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
                        value = "">
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
                        <input 
                        type="text"
                        class="block shadow-5xl mb-10 p-2 w-full
                        placeholder-gray-600"
                        name="tags"
                        value = "">
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
                        ></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-3 text-center" >
                    <div class="col-span-4"></div>
                    <div class="col-span-4 text-center">
                        <button type="submit"
                        class="bg-green-500 block shadow-5xl mb-10 
                        p-2 w-80 uyppercase font-bold">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>                    
    </form>
</x-app-layout>
