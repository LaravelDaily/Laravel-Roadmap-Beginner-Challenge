<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-black-800 leading-tight">
            Tag: {{ strtoupper($tag->name) }} 
        </h1>
    </x-slot>    
    <form 
    action="{{ route('admin.tags.update', $tag->id) }}"
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
                            <label class="font-bold" for="name">
                                Name:
                            </label>                            
                        </div>
                        <div class="col-span-6">
                            <input 
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-full
                            placeholder-gray-600"
                            name="name"
                            value = "{{ $tag->name }}">
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
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
