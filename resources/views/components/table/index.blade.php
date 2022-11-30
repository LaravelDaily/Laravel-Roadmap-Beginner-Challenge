@props(['heads'])

<div {{ $attributes->merge(['class' => "relative shadow-md sm:rounded-t"]) }}>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-white uppercase bg-gray-500">
            <tr>
                @foreach($heads as $head)
                    <th scope="col" class="py-2 px-6">
                        {{ $head }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
