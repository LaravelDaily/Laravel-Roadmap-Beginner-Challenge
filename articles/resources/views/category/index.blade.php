@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($category as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->category}}</td>
      <td>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">

            <a href="{{ route('category.edit', $category->id) }}" title="edit">
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