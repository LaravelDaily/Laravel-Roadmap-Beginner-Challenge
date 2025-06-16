
<li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
    <div class="flex items-center ps-3">
        <input id="{{ $name }}" type="checkbox" name="{{ $atname }}" value="{{ $name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
            {{ $attributes->merge(['checked' => $attributes->get('checked') ? 'checked' : null]) }}>
        <label for="{{ $name }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $slot }}</label>
    </div>
</li>
