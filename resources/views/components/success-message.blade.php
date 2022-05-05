@if (session('success'))
    <div class="w-full font-bold p-2 bg-green-100 border-l-4 my-4 border-green-300 text-green-500">
        {{ session('success') }}
    </div>
@endif
