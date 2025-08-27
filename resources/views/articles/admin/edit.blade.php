<x-app-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-4 flex items-center justify-between">
        <div class="flex-1 min-w-0">
          <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{__('Edit')}} {{$article->title}}
          </h2>
        </div>
      </div>
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
              <x-label for="title">Title</x-label>
              <x-input class="block w-full mt-1" name="title" required value="{{ old('title', $article->title) }}"
                type="text" />
              @error('title')
              <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <x-label for="image_path">Image</x-label>
              <x-input class="block w-full mt-1" name="image_path" type="file" />
              @error('image_path')
              <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <x-label class="block text-sm text-gray-600" for="tags">Tags</x-label>
              <x-input class="block w-full mt-1" name="tags" type="text" value="{{ old('tags', $tags) }}" />
              <span class="text-xs text-gray-400">Separated by comma</span>
              @error('tags')
              <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <x-label for="category">Category</x-label>
              <select name="category" class="block w-full mt-1">
                <option value="#">--- {{__('Select Category')}} ---</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (in_array($category->id,
                  $article->category->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category')
              <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <x-label class="block text-sm text-gray-600" for="body">article Content</x-label>
              <textarea class="block w-full mt-1" name="body" required
                rows="6">{{ old('body', $article->body) }}</textarea>
              @error('body')
              <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mt-6">
              <x-button class="bg-green-500 hover:bg-green-700">Submit</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>