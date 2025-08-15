@extends('layouts.app')
@section('content')

<form method="post" action="{{ route('tag.update', $tag->id) }}">
@csrf
@method('PATCH')
<div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

@endsection