@props(['categoryId'])

<a class="text-sm border-2 border-red-500 cursor-pointer hover:bg-red-500 hover:text-white px-4 text-red-500"
   href="/?category={{$categoryId}}"
>
    {{ $slot }}
</a>
