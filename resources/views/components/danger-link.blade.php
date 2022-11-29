<a {{ $attributes->merge(['class' => "inline-flex items-center px-4 py-2 bg-red-300 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition"]) }}>
    {{ $slot }}
</a>
