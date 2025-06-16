<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.guest-navigation')
    </x-slot>

    <div class="bg-white">
        {{-- Hero Section --}}
        <section class="px-3 sm:px-6 lg:px-8 py-12 md:h-[32rem] flex flex-col md:flex-row gap-10">
            <div class="md:h-full md:w-1/2">
                <img 
                    src="https://images.unsplash.com/photo-1709884732294-90379fee354c?q=80&w=1856&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                    alt="Landing page hero image"
                    class="object-cover object-center h-full"
                >
            </div>
            <div class="md:h-full md:w-1/2 flex flex-col justify-end">
                <div>
                    2022.11.25
                </div>
                <div class="text-4xl font-semibold pb-2 pt-3">
                    How jewellery makes you poor.
                </div>
            </div>
        </section>

        {{-- Body Section --}}
        <section class="px-3 sm:px-6 lg:px-8 py-2">
            <div class="mb-6 pl-2 text-4xl roboto-regular border-l-4 border-gray-600">
                Recent Posts
            </div>

            <div class="mb-6">
                <form action="">
                    <select 
                        name="categoryId" 
                        id="categoryId"
                        x-data=""
                        x-on:change="()=>{
                            let categoryFormSubmitBtn = document.querySelector('#categoryFormSubmitBtn')
                            categoryFormSubmitBtn.click()
                        }"
                    >
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                                {{ $category->id == session('categoryId') ? 'selected' : ''  }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button id="categoryFormSubmitBtn" hidden>Submit</button>
                </form>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                @if (count($articles) === 0)
                    {{ __('No Post to display.') }}
                @else
                    @foreach ($articles as $article)
                        <div>
                            <div class="h-60">
                                <img 
                                    src=" {{ $article->getFirstMediaUrl('article_images') }} " 
                                    alt="image name"
                                    class="h-full w-full object-cover object-center"
                                >
                            </div>
                            <div>
                                <div class="mt-2"> 
                                    {{ (new DateTime($article->created_at))->format('Y.m.d') }} 
                                </div>
                                <h2 class="text-2xl font-semibold my-2">
                                    {{ $article->title }}
                                </h2>
                                <div>
                                    @foreach ($article->tags as $tag)
                                        <x-tag style="background-color: {{ $tag->tag_color }}">
                                            {{ $tag->name }}
                                        </x-tag>
                                    @endforeach
                                </div>
                                <div class="mt-4">
                                    <a href=" {{ route('article.show', $article->id) }} ">
                                        <x-primary-button type="button">
                                            READ MORE
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </div>        
                    @endforeach
                @endif
            </div>
            <div>
                {{ $articles->links() }}
            </div>
        </section>
    </div>
</x-app-layout>
