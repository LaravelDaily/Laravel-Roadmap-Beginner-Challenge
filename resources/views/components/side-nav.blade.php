<aside {{ $attributes->merge(['class' => '']) }} >

    <nav class="flex flex-col font-bold bg-white shadow">
        <a href="{{ route('manage.article.index') }}"
           class="hover:bg-blue-500 hover:text-white p-2 {{ request()->is('manage/article*') ? 'bg-blue-500 text-white' : '' }}">Article</a>
        <a href="{{ route('category.index') }}"
           class="hover:bg-blue-500 hover:text-white p-2 {{ request()->is('manage/category*') ? 'bg-blue-500 text-white' : '' }}">Category</a>
        <a href="{{ route('tag.index') }}"
           class="hover:bg-blue-500 hover:text-white p-2 {{ request()->is('manage/tag*') ? 'bg-blue-500 text-white' : '' }}">Tag</a>
    </nav>
</aside>
