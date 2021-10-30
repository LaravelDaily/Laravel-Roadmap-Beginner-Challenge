<x-layout-manage>
    <h2 class="font-bold mb-4 text-2xl">Article</h2>

    <form action="{{ route('manage.article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-4">
            <label for="name">Title:</label>
            <input type="text" name="title" id="title"
                   class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 text-gray-500 w-full"
                   value="{{ old('title') }}"
            >
        </fieldset>

        <fieldset class="mb-4">
            <label for="name">Full Text:</label>
            <textarea name="text" id="text" cols="30" rows="3"
                      class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 text-gray-500 w-full"
            >{{ old('text') }}</textarea>
        </fieldset>

        <fieldset class="mb-4">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id"
                    class="block font-medium outline-none px-2 py-1 ring-1 ring-blue-500 text-gray-500 w-full">
                @foreach($categories as $category)
                    <option
                        {{ old('category_id') === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="mb-4">
            <label for="name">Image:</label>
            <input type="file" name="image" id="image"
                   class="block font-medium outline-none px-2 py-1 ring-1 ring-blue-500 text-gray-500 w-full">
        </fieldset>

        <x-button type="submit">Create</x-button>

        <x-error-messages/>
    </form>
</x-layout-manage>
