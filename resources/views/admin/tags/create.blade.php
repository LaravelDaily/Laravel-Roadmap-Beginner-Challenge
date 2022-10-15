<x-app-layout>
    <div class="py-12 min-h-screen">
        <div class="container mx-auto px-4">

            <div class="flex justify-between mx-10">
                <h1 class="text-2xl font-semibold">
                    Create Tag
                </h1>
            </div>
            <div class="overflow-x-auto flex items-center justify-center  mt-8 ">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Tag
                                        name :</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        class="mt-1 block  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
