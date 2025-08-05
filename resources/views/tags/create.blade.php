<x-app-layout xmlns="http://www.w3.org/1999/html">
    <form class="max-w-md mx-auto" method="POST" action="{{ route('tag.store') }}">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <br><br>
            Register Tag
            <br><br><br><br>
            <input type="text" name="name" id="floating_name_tag" class="block py-2.5 px-0 w-full text-sm
            text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-zinc-950
            dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600
            peer" placeholder="Name Tag" required/>
            <br><br>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
    </form>
</x-app-layout>