<x-app-layout>
  <x-header>Create new Article</x-header>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:mx-6 lg:mx-8 sm:p-6 lg:p-8 bg-white rounded-xl">
      <form
        action="{{ route('articles.store') }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf
        <x-auth-validation-errors></x-auth-validation-errors>

        <div class="flex flex-col space-y-4">
          <div>
            <x-label for="title">Article Title</x-label>
            <x-input type="text" name="title" id="title" class="w-full" value="{{ old('title') }}" />
          </div>

          <div>
            <x-label for="body">Article Content</x-label>
            <x-textarea name="body" id="body" class="w-full">{{ old('body') }}</x-textarea>
          </div>

          <div>
            <x-label for="category">Category</x-label>
            <select name="category_id" class="w-full" id="category">
              <option value="">-- Choose a Category --</option>
              @foreach ($categories as $category)
                <option
                  value="{{ $category->id }}"
                  @if (old('category') == $category->id)
                    selected
                  @endif
                >
                  {{ ucfirst($category->name) }}
                </option>
              @endforeach
            </select>
          </div>

          <div>
            <x-label for="image">Featured Image</x-label>
            <x-input type="file" name="image" id="image" />
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
