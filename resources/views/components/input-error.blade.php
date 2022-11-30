@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            @if(is_array($message))
                <li>{{ $message[0] }}</li>
            @else
                <li>{{ $message }}</li>
            @endif
        @endforeach
    </ul>
@endif
