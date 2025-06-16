@component('layouts.main')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new article</h2>
            <form action="{{ route('article.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <x-input-text name="title" hint="type your title" :value="$article->title"/>
                    <x-checkbox-input title="tags">
                        @foreach($tags as $tag)
                            <x-checkbox-option atname="tags[]" name="{{ strtolower($tag->id) }}" :checked="$article->tags->contains($tag)">
                                {{ ucwords($tag->name) }}
                            </x-checkbox-option>
                        @endforeach
                    </x-checkbox-input>
                    <x-select-option-input name="category">
                        @foreach($categories as $category)
                            <x-option value="{{ strtoupper($category->id) }}" :selected="$article->category == $category">
                                {{ ucwords($category->name) }}
                            </x-option>
                        @endforeach
                    </x-select-option-input>
                    <x-text-area-input name="body" hint="your description here" :value="$article->body" />
                    @isset($article->image)
                        <p class="text-black dark:text-white">Article Image:</p>
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="rounded-full w-24">

                    @endisset
                    <x-image-input name="image">
                        SVG, PNG, JPG (optional)
                    </x-image-input>
                </div>
                <x-primary-button class="mt-5">
                    Update Article
                </x-primary-button>
            </form>
            <div class="my-4">
                @if($errors->any())
                    {!!  implode('', $errors->all('<li class="text-md font-bold text-red-500 text-sm">:message</li>')) !!}
                @endif
            </div>
        </div>
    </section>
@endcomponent
