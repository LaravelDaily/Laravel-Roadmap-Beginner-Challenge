<x-layout-manage>
    <h2 class="font-bold mb-4 text-2xl">Tag</h2>

    <form action="{{ route('tag.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')

        <fieldset class="mb-4">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}"
                   class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 text-gray-500 w-full">
        </fieldset>
        <x-button type="submit">Update</x-button>

        <x-error-messages/>
    </form>
</x-layout-manage>
