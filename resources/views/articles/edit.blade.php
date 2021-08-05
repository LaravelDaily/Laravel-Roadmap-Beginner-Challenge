<x-app-layout>
  <x-header>Editing {{ $article->title}}</x-header>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:mx-6 lg:mx-8 sm:p-6 lg:p-8 bg-white rounded-xl">
      <form
        action="{{ route('articles.update', $article->id) }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf
        @method('PATCH')
        <x-auth-validation-errors></x-auth-validation-errors>

        <div class="flex flex-col space-y-4">
          <div>
            <x-label for="title">Article Title</x-label>
            <x-input type="text" name="title" id="title" class="w-full" value="{{ old('title') ?? $article->title }}" />
          </div>

          <div>
            <x-label for="body">Article Content</x-label>
            <x-textarea name="body" id="body" class="w-full">{{ old('body') ?? $article->body }}</x-textarea>
          </div>

          <div class="flex justify-between space-x-8">
            <div class="w-1/2">
              <x-label for="category">Category</x-label>
              <select name="category_id" class="w-full" id="category">
                <option value="">-- Choose a Category --</option>
                @foreach ($categories as $category)
                  <option
                    value="{{ $category->id }}"
                    @if ((old('category') ?? $article->category->id ?? null) == $category->id)
                      selected
                    @endif
                  >
                    {{ ucfirst($category->name) }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="w-1/2">
              <x-label for="tags">Tags</x-label>
              <select name="tag_ids[]" class="w-full" id="tags" multiple>
                <option value="">-- None --</option>
                @foreach ($tags as $tag)
                  <option
                    value="{{ $tag->id }}"
                    @if (collect(old('tag_ids'))->contains($tag->id) || $article->tags->pluck('id')->contains($tag->id))
                      selected
                    @endif
                  >
                    {{ ucfirst($tag->name) }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <h4 class="text-lg">Featured Image</h4>
          @if ($article->image)
            <div class="h-48 w-48">
              <img class="object-scale-down" src="{{ asset($article->image) }}" alt="{{ $article->title }} Featured Image">
            </div>
          @endif
          <div>
            @if ($article->image)
              <x-label for="image">Upload a new Image</x-label>
            @else
              <x-label for="image">Upload an Image</x-label>
            @endif
            <x-input class="mt-2" type="file" name="image" id="image" />

            @if ($article->image)
              <div class="mt-4">
                or
                <x-input type="checkbox" name="delete_image" id="delete_image" />
                <x-label for="delete_image" class="inline-block">Remove the Image</x-label>
              </div>
            @endif
          </div>
        </div>

        <div class="text-right space-x-2 mt-4">
          <x-button class="bg-green-600 hover:bg-green-500">Save</x-button>
          <x-button type="button">
            <a href="{{ route('dashboard') }}">Cancel</a>
          </x-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
