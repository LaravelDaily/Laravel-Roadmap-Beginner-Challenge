@props(['type' => 'text', 'name', 'id', 'placeholder' => 'Type here'])
<input
    {{ $attributes->merge([
        'type' => $type,
        'name' => $name,
        'id' => $id,
        'placeholder' => $placeholder,
        'class' =>
            'rounded-md w-full h-4/6 outline-none text-gray-800 caret-indigo-400 focus:border-indigo-200 focus:border-2 border-1 border-gray-200 shadow-md',
    ]) }}
    required />
