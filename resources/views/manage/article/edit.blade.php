<x-layout-manage>
    <h2 class="font-bold mb-4 text-2xl">Article</h2>
    <x-error-messages/>

    <form action="{{ route('manage.article.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <fieldset class="mb-4">
            <label for="name">Title:</label>
            <input type="text" name="title" id="title"
                   class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 text-gray-500 w-full"
                   value="{{ old('title') ?? $article->title }}"
            >
        </fieldset>

        <fieldset class="mb-4">
            <label for="name">Full Text:</label>
            <textarea name="text" id="text" cols="30" rows="3"
                      class="block font-medium outline-none px-4 py-1 ring-1 ring-blue-500 text-gray-500 w-full"
            >{{ old('text') ?? $article->text }}</textarea>
        </fieldset>

        <fieldset class="mb-4">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id"
                    class="block font-medium outline-none px-2 py-1 ring-1 ring-blue-500 text-gray-500 w-full">
                @foreach($categories as $category)
                    <option
                        {{ old('category_id') ?? $article->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="mb-4">
            <h2>Tags</h2>
            <div class="grid grid-cols-4">
                @foreach($tags as $tag)
                    <div>
                        <input type="checkbox" id="tags" name="tags[]"
                               value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </div>
                @endforeach
            </div>
        </fieldset>

        <fieldset class="mb-4">
            <label for="name">Image:</label>
            <input type="file" name="image" id="image"
                   class="block font-medium outline-none px-2 py-1 ring-1 ring-blue-500 text-gray-500 w-full">
        </fieldset>

        <figure>
            <img src="{{ str_starts_with($article->image, 'https')
                            ? $article->image
                            : asset('storage/' . $article->image)
                            }}"
                 alt="Article Image" class="w-48 h-48 mb-4">
        </figure>

        <x-button type="submit">Update</x-button>

    </form>
</x-layout-manage>
