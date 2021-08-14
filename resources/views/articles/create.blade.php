<x-app-layout>

    <div class="my-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-1/3  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Article') }}
                </h2>
            </x-slot>

            <form enctype="multipart/form-data" method="POST" action="{{ route('article.store') }}">
            @csrf
            @method('POST')
            <!-- Title -->
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <x-label for="title" :value="__('Title')"></x-label>
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                 required
                                 autofocus></x-input>
                    </div>

                </div>
                <div class="mt-4">
                    <x-label for="Category" :value="__('Category')"></x-label>
                    <select id="Category"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <!-- Text -->
                <div class="mt-4">
                    <x-label for="fulltext" :value="__('Text')"></x-label>

                    <textarea id="fulltext" placeholder="Text goes here...."
                              class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              name="fulltext" required></textarea>
                </div>
                <div class="mt-4">
                    <div>
                        <x-label for="article_image" :value="__('Article image')"></x-label>
                        <input id="article_img" type="file" name="article_image">
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Store') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
        <script>
            // Get a reference to the file input element
            const inputElement = document.querySelector('input[type="file"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                }
            });
        </script>
    @endsection
</x-app-layout>
