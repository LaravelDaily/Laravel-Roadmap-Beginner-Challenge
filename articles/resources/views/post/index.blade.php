@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($post as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td><img src="./images/{{$post->image}}" alt="post image" style="width:10%;height:10%"/>
    </td>
      <td>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">

            <a href="{{ route('post.edit', $post->id) }}" title="edit">
                <i class="fas fa-edit  fa-lg"></i>
            </a>
            @csrf
           @method('DELETE')

            <button type="submit" title="delete" style="border: none; background-color:transparent; outline: none;" onclick="return confirm('Are you sure you want to delete this?')">
                <i class="fas fa-trash fa-lg text-danger"></i>
            </button>
                </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection