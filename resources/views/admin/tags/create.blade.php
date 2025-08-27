<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-black-800 leading-tight">
            New Tag
        </h1>
    </x-slot>    
    <form 
        action="{{ route('admin.tags.store') }}"
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
                            value = "">
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
