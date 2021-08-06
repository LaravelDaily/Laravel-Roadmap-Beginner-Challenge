@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 bg-green-100 py-2 px-1']) }}>
        {{ $status }}
    </div>
@endif
