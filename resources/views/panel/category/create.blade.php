<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-24">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-12 sm:p-6 bg-white">
                    @if(session('status'))
                        <div x-data="{ show: true }" x-show="show"
                             x-transition:enter.duration.500ms
                             x-transition:leave.duration.1000ms
                             x-init="setTimeout(() => show = false, 3000)"
                             class="flex mb-3 justify-between items-center bg-green-300 relative text-white py-3 px-3 rounded-lg">
                            <div>
                                {{ session('status') }}
                            </div>
                            <div>
                                <button type="button" @click="show = false" class=" text-white">
                                    <span class="text-2xl">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="mt-5 shadow md:mt-0 md:col-span-2">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                                Name
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" name="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Category Name...">
                                            </div>
                                            <div class="text-red-600 text-sm mt-1">
                                                @error('name')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
