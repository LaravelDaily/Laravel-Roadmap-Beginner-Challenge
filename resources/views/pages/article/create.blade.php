<x-pages.article.layout>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="ml-3 mt-1">
            <x-label for="title" :value="__('Title')" />

            <x-input name="title" :value="old('title')" required autofocus />
        </div>

        <div class="ml-3 mt-1">
            <x-label for="image" :value="__('Image')" />

            <input type="file" name="image" accept="image/*"/>
        </div>

        <div class="ml-3 mt-1">
            <x-label for="category" :value="__('Category')" />

            <select name="category">
                <option value='' disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="ml-3 mt-1">
            <x-label for="tags[]" :value="__('Tags')" />

            <select name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
        </div>

        <div class="ml-3 mt-1">
            <x-label for="full_text" :value="__('Full Text')" />

            <textarea class="w-full" name="full_text" required>{{old('full_text')}}</textarea>
        </div>

        <x-button class="ml-3 mt-1">
            {{ __('Save') }}
        </x-button>
    </form>

</x-pages.article.layout>