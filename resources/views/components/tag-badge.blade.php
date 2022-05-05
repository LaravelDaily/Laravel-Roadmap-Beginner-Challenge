@props(['tagId'])

<a class="text-sm rounded-full border-2 border-green-500 cursor-pointer hover:bg-green-500 hover:text-white px-4 text-green-500"
   href="/?tag={{$tagId}}"
>
    {{ $slot }}
</a>
