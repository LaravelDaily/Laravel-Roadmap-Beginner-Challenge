@props(['old_value'])
<label>
    {{__('tags')}}
</label>
<select class="select2 form-control" multiple="multiple" name="tag_id[]">
    @foreach($tags as $tag)
        <x-forms.tags-select-option :tag="$tag" :old_value="$old_value"></x-forms.tags-select-option>
    @endforeach
</select>

@error('tag_id')
<p style="color: red">
    {{$message}}
</p>
@enderror
