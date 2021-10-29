<x-layout>
    <form action="{{ route('session.store') }}" method="POST" class="bg-white p-4 rounded-2xl shadow-md">
        @csrf
        <h1 class="text-2xl font-bold mb-4">Log In</h1>
        <fieldset class="mb-4">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email"
                   class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 rounded-2xl text-gray-500 w-full">
        </fieldset>
        <fieldset class="mb-4">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"
                   class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 rounded-2xl text-gray-500 w-full">
        </fieldset>
        <x-button type="submit">Log In</x-button>

        <x-error-messages/>

    </form>
</x-layout>
