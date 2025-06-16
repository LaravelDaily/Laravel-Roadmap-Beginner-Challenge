<div class="sm:col-span-2">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ ucwords($name) }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ $hint }}" required=""
        {{ $attributes->merge(['value' => $attributes->get('value') ]) }}>
</div>
