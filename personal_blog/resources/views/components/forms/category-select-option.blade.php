@props(['category','old_value'])
<option value="{{$category->id}}" {{$category->id == $old_value? 'selected': ''}} {{ old('category_id') == $category->id  ? 'selected' : '' }}>
    {{$category->title}}
</option>
