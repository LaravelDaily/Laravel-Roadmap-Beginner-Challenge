@props(['old_value'])
<label>
    {{__('category')}}
</label>
<select class="select2 form-control" name="category_id">
    <option></option>
    @foreach($categories as $category)
        <x-forms.category-select-option :category="$category" :old_value="$old_value"></x-forms.category-select-option>
    @endforeach
</select>

@error('category_id')
<p style="color: red">
    {{$message}}
</p>
@enderror
