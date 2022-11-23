<x-slot name="js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet">
    </link>
    <script>
        new SlimSelect({
            select: document.querySelector('.multipleSelect'),
            placeholder: 'Select Tags',
            hideSelectedOption: true,
        })
    </script>
    <script type="text/javascript">
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview");
                preview.src = src;
            }
        }
    </script>
</x-slot>
<div class="my-2">
    <div class="flex justify-center items-center w-full">
        <label for="dropzone-file" id="dropzone"
            class="flex bg-cover bg-no-repeat  flex-col justify-center items-center w-full h-64 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                <p class="mb-2 text-md text-gray-700">Article Image</p>
                <img class="max-w-full h-auto absolute opacity-40" id="preview"
                    src="{{ asset('storage/' . $article->image) }}" alt="">
                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                        upload
                        <p class="text-xs text-gray-500">PNG, JPG or JPEG (Ratio 16:9) (MAX:2MB)</p>
                        @error('image')
                            <p class="my-2 text-pink-600">{{ $message }}</p>
                        @enderror
            </div>
            <input id="dropzone-file" name="image" type="file" class="hidden" onchange="showPreview(event);">
        </label>
    </div>

</div>
<div class="my-2 flex gap-x-4">
    <div class="w-2/5 ">
        <label class="text-gray-600 font-thin text-md tracking-normal" for="title">
            Title
        </label>
        <x-form-input name='title' id='title' value="{{ old('title') ?? $article->title }}" autofocus />
        @error('title')
            <div class="my-2 text-pink-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="w-1/5">
        <label class="text-gray-600 font-thin text-md tracking-normal" for="category_id">
            Category
        </label>
        <select name="category_id" id="category_id"
            class="rounded-md h-4/6 w-full outline-none text-gray-800 caret-indigo-400 focus:border-indigo-200 focus:border-2 border-1 border-gray-200 shadow-md">
            <option disabled selected>Select Category</option>
            @forelse ($categories as $category)
                <option {{ $article->category()->find($category->id) ? 'selected' : '' }} value="{{ $category->id }}">
                    {{ $category->name }}</option>
            @empty
                <option disabled>No Category Yet</option>
            @endforelse
        </select>
        @error('category')
            <div class="my-2 text-pink-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="w-2/5">
        <label class="text-gray-600 font-thin text-md tracking-normal" for="tags">
            Tags
        </label>
        <select name="tags[]" id="tags" multiple
            class="multipleSelect h-4/6 rounded-md w-full outline-none text-gray-800 caret-indigo-400 focus:border-indigo-200 focus:border-2 border-1 border-gray-200 shadow-md">
            @forelse ($tags as $tag)
                <option {{ $article->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
                    {{ $tag->name }}
                </option>
            @empty
                <option disabled>No Tag Yet</option>
            @endforelse
        </select>
        @error('tags')
            <div class="my-2 text-pink-600">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="my-2">
    <label class="text-gray-600 font-thin text-md tracking-normal" for="body">
        Body
    </label>
    <textarea type="text" placeholder="Type here" name="body" id="body" required
        class="w-full rounded-md outline-none text-gray-800 caret-indigo-400 focus:border-indigo-200 focus:border-2 border-1 border-gray-200 shadow-md">
        {{ old('body') ?? $article->body }}
    </textarea>
</div>
<div class="flex justify-end">
    <x-button type="submit">{{ $submit }}</x-button>
</div>
