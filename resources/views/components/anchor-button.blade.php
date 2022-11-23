<a
    {{ $attributes->merge([
        'class' => 'cursor-pointer px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700 shadow',
    ]) }}>{{ $slot }}</a>
