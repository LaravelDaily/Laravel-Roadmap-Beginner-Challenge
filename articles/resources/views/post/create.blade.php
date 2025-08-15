@extends('layouts.app')
@section('content')

<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>


  <div class="mb-3">
    <select class="form-select form-control" name="category_id">
    <option value="">Open this select menu</option>
    @foreach($category as $category)
    <option value="{{$category->id}}">{{$category->category}}</option>
    @endforeach
    </select>
    </div>

    <div class="mb-3">
      <div id="tag">
      <select name="tag_id[]" class="form-select form-control" >
        <option value="">Select Type</option>
          @if($tag)
          @foreach($tag as $row)
          <option value="{{ $row->name }}">{{ $row->name }}</option>
            @endforeach
            @endif
          </select>
          </div>
          <br/>
          <input type="button" name="add" id="add" value="Add"/>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="description" name="description">
    </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   $(document).ready(function(){  
  var i=0;
  $("#add").click(function(){
		++i;

		$("#tag").append(
      `<br/>
      <select name="tag_id[]" class="form-select form-control" >
        <option value="">Select Type</option>
          @if($tag)
          @foreach($tag as $row)
          <option value="{{ $row->name }}">{{ $row->name }}</option>
          @endforeach
          @endif
        </select>`)
  });
   });

</script>      
@endsection
