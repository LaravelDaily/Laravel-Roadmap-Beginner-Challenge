@props(['text'])
<div class="flex items-center justify-between border-b border-gray-300 p-1 mb-4">
    <h3 class="text-xl font-thin tracking-wide text-gray-800">{{ $text }}</h3>
    {{ $slot }}
</div>
