@props(['title'])

<x-slot name="header">
  <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ Str::of($title)->plural() }}
    </h2>
    {{ $slot }}
  </div>
</x-slot>
