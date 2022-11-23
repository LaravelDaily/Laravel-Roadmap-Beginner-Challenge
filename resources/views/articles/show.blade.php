<x-guest-layout>
    <x-header text="{{ $article->title }}">
        @auth
            <div class="flex gap-x-2">
                <x-anchor-button href="{{ route('articles.edit', $article->slug) }}">Edit</x-anchor-button>
                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-rose-600 hover:bg-rose-700" type="submit">Delete</x-button>
                </form>
            </div>
        @endauth
    </x-header>
    <div class="flex justify-between">
        <span class=" py-1 px-2 text-md font-medium">Category : {{ $article->category->name }}</span>
        <div class="gap-x-1">
            @foreach ($article->tags as $tag)
                <span class="tracking-tight italic text-sm font-medium before:content-['#']">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
    <img class=" w-full" src="{{ asset('storage/' . $article->image) }}" alt="">
    <p class="tracking-wide font-sans text-gray-900 indent-8 my-3 leading-relaxed">Lorem ipsum dolor sit amet
        consectetur,
        adipisicing
        elit. Blanditiis, soluta? Velit corporis nihil, voluptas debitis temporibus, hic aliquam fugit omnis ipsum
        commodi officiis, iusto iure voluptatum voluptatibus! At vel exercitationem quia animi suscipit officiis
        temporibus? Perferendis, nostrum repellat quos libero consequuntur ad architecto nulla, reprehenderit omnis
        laboriosam assumenda. Eveniet quae cupiditate similique? Consequatur distinctio aut laborum minus dolor odit
        similique dignissimos id velit, nisi sequi vel maxime recusandae dolore ex illum voluptate accusantium quod
        consequuntur. Beatae soluta, consectetur perferendis deleniti eius doloribus vero facere, ad, illo ipsam
        quia consequatur eum provident. Distinctio, tempora voluptas. Quae accusantium qui delectus omnis
        praesentium!
    </p>
    <a href="{{ route('articles.index') }}"
        class="px-4 py-2 cursor-pointer rounded-md bg-indigo-600 text-white hover:bg-indigo-700 shadow">&lt;&nbsp;Back</a>
</x-guest-layout>
