@props(['value'])

<label {{ $attributes->merge(['class' => 'inline-block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
