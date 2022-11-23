<label class="text-gray-600 font-thin text-md tracking-normal" for="name">
    Category Name
</label>
<x-form-input name='name' id='name' :value="old('name') ?? $category->name" autofocus />
@error('name')
    <div class="my-2 text-pink-600">{{ $message }}</div>
@enderror
<div class="flex justify-end my-4">
    <x-button type="submit">{{ $submit }}</x-button>
</div>
