<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex my-3 mb-4" > 
            <x-text-input name="title"  placeholder="{{ __('Title text?') }}" class="mr-3 mb-4 flex-1" style="margin-right: 3rem"></x-text-input>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <x-text-input name="tags"  placeholder="{{ __('Tags coma seperated!') }}" class="flex-1 mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></x-text-input>
            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>
            <select name="category_id" id="category_id" class="form-control block mb-4  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-12">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            <x-picture-input/>
                <textarea
                    name="full_text"
                    placeholder="{{ __('Article text?') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                >{{ old('full_text') }}</textarea>
                <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
            <x-input-success :messages="session('status')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Article') }}</x-primary-button>
        </form>
        <div class="mt-6  shadow-sm rounded-lg">
            @foreach ($articles as $article)
                <div class="p-6 bg-white mb-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-800">Category:{{ $article->category->name }}</span>
                            </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-800">Tags:   
                                    @foreach ($article->tags as $tag)
                                        {{ $tag->name }},
                                    @endforeach
                            </span>
                        </div>
                    
                        <a class="text-gray-800">{{ $article->title }}</a>
                        <div class="flex justify-between items-stretch">
                            <p class="text-lg text-gray-900">{{ $article->full_text }}</p>
                            <img src="{{asset('images/'.$article->image)}}" alt="" class="place-self-stretch rounded-md  h-20" >
                        </div>
                        <a href="{{ route('articles.show', $article) }}"
                        <x-secondary-button>Read more</x-secondary-button>
                        </a>
                        <a href="{{ route('articles.edit', $article) }}"
                            <x-secondary-button>Edit article</x-secondary-button>
                        </a>
                        <small class="ml-2 text-sm text-gray-600 float-end">{{ $article->created_at->format('j M Y, g:i a') }}</small>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>