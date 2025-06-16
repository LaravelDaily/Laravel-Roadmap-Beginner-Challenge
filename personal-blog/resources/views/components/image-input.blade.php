<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">Upload Image</label>
<input name="{{ $name }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="{{ $name }}" id="{{ $name }}" type="file"">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="{{ $name }}">{{ $slot }}</p>
