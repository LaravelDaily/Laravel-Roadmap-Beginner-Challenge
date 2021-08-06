@extends('layouts.app')
@section('content')

<form method="post" action="{{route('tag.store')}}">
  @csrf
  <div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

@endsection