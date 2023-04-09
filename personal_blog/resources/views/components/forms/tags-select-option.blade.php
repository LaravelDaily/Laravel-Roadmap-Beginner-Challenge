@props(['tag', 'old_value'])
<option value="{{$tag->id}}" {{in_array($tag->id, $old_value->toArray())? 'selected': ''}} {{ (collect(old('tag_id'))->contains($tag->id)) ? 'selected':'' }}>
    {{$tag->title}}
</option>
