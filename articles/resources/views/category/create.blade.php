@extends('layouts.app')
@section('content')

<form method="post" action="{{route('category.store')}}">
  @csrf
  <div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

@endsection