@if ($errors->any())
    <div class="text-sm p-2 mt-4 font-bold text-red-500">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
