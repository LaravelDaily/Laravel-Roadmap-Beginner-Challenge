@props([
'name',
'old_record'
])
<div class="form-group">
    <label class="">
        {{__($name)}}
    </label>
    <input name="{{$name}}" type="file" class="form-control @error($name) is-invalid @enderror">
</div>


@error($name)
<p style="color: red">
    {{$message}}
</p>

@enderror
