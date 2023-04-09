@props([
'name',
'old_record'
])
<label>
    {{__($name)}}
</label>
<textarea name="{{$name}}" type="text" class="form-control @error($name) is-invalid @enderror">
{{old($name, trim($old_record) != ''?$old_record: '')}}
</textarea>
@error($name)
<p style="color: red">
    {{$message}}
</p>
@enderror
