<x-app-layout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4 flex items-center justify-between">
          <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
              {{__('Edit')}} {{$category->name}}
            </h2>
          </div>
        </div>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
              @method('PUT')
              @csrf
              <div>
                <x-label class="block text-sm text-gray-600" for="name" />Name
                <x-input class="block w-full mt-1" name="name" type="text" value="{{ $category->name }}" required />
                @error('name')
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