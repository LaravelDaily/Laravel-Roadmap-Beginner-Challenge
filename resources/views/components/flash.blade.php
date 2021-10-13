@props([
    'type' => 'success',
    'colors' => [
        'success' => 'bg-green-400',
        'error' => 'bg-red-400',
        'warning' => 'bg-yellow-400',
    ]
])
@if (session()->has($type))
    <section class="{{ $colors[$type] }} p-4" >
        <div class="flex justify-between">
            <p>
                {{ session($type) ?? $slot }}
            </p>
        </div>
    </section>
@endif
