<button {{ $attributes->merge(['class' => "bg-blue-500 font-bold hover:bg-blue-600 px-4 py-1 text-white text-xl"]) }} >
    {{ $slot }}
</button>
