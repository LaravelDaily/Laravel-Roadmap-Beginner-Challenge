@extends('layouts.app')
@section('content')

<form method="post" action="{{ route('category.update', $category->id) }}">
@csrf
@method('PATCH')
<div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category" value="{{$category->category}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

@endsection