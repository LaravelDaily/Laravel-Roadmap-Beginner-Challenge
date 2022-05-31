<x-master>
    <div class="w-1/2 mx-auto shadow-lg bg-white py-4 px-5 mt-2">
        <a href="{{route('category.index')}}"
            class="text-base md:text-sm text-blue-500 font-bold no-underline hover:underline">
            &lt; BACK TO CATEGORIES
        </a>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action='{{route('category.store')}}'>
            @csrf
            <div class="mb-6 flex items-center">
                <label for="name" class="mr-2 text-sm font-medium text-gray-900">Category Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
            </div>
            <button type="submit"
                class="w-full px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Submit</button>
        </form>
    </div>
</x-master>