@props(['disabled' => false, 'rows' => 3])

<textarea rows="{{ $rows }}" {!! $attributes->merge(['class' => 'block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>{{ $slot }}</textarea>