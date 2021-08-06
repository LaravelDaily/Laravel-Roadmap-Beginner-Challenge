@extends('layouts.app')
@section('content')

<form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
@csrf
@method('PATCH')
  <div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title"
     value="{{$post->title}}">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>


  <div class="mb-3">
  <select name="category_id" class="form-control" >
			<option value="">Select Department</option>
			@foreach($category as $category)
			<option value="{{ $category->id }}" 
        {{ $category->id == $post->category_id ? 'selected' : '' }}>
        {{ $category->category }}</option>
			@endforeach
			</select> 
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tags</label>
    <input type="text" class="form-control" id="tag" name="tag">
  </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="description"
     value="{{$post->description}}" name="description">
    </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection