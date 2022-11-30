<x-app-layout>
    <section class="container mx-auto py-2">
        <h1 class="text-4xl text-gray-300 border-b">Create Article</h1>

        <section class="mt-10 overflow-x-scroll">
            <form method="post" action="{{ route('dashboard.articles.store') }}" enctype="multipart/form-data">
                @csrf

                <section>
                    <x-input-label for="title" class="text-lg" value="title" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autofocus :value="old('title')" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </section>
                <section class="mt-2">
                    <x-input-label for="full_text" class="text-lg" value="full text" />
                    <x-textarea id="full_text" name="full_text" class="mt-1 block w-full" rows="5">{{ old('full_text') }}</x-textarea>
                    <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
                </section>
                <section class="mt-2">
                    <x-input-label for="image" class="text-lg" value="image" />
                    <input type="file" id="image" name="image" class="text-white"/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </section>

                <section class="mt-2">
                    <x-input-label for="tags" class="text-lg" value="tags" />
                    <x-select id="tags" name="tags[]" type="text" class="mt-1 block w-full" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags') ?? []))>{{ $tag->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                </section>

                <section class="mt-2">
                    <x-input-label for="categories" class="text-lg" value="categories" />
                    <x-select id="categories" name="categories[]" type="text" class="mt-1 block w-full" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(in_array($category->id, old('categories') ?? []))>{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                    <x-input-error :messages="$errors->get('categories.*')" class="mt-2" />
                </section>

                <x-primary-button class="mt-10 !bg-green-300">Create</x-primary-button>
            </form>
        </section>
    </section>
</x-app-layout>
