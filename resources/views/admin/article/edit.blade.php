<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex my-3" >
        <x-text-input name="title"  :value="old('title', $article->title)" placeholder="{{ __('Title text?') }}" class="mr-3 flex-1" style="margin-right: 3rem"></x-text-input>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
        <x-text-input name="tags"  :value="old('tags', $tags)" placeholder="{{ __('Tags coma seperated!') }}" class=" flex-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></x-text-input>
        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </div>
   
        <select name="category_id" id="category_id" class="form-control block  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-12">
            {{ $categories }}
            @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected( $article->category->id == $category->id )>
                        {{ $category->name }}
                    </option>
            @endforeach
        </select>
        <x-picture-input :image="old('image', $article->image)"/>
        <textarea
            name="full_text"
            placeholder="{{ __('Article text?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
        >{{ old('full_text', $article->full_text) }}</textarea>
        <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
        <x-input-success :messages="session('status')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Edit article!') }}</x-primary-button>
    </form>
</div>
</x-app-layout>