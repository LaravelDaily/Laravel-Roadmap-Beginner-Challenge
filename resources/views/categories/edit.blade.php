@extends('layaouts.master')
@section('titre','midifier une category')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger my-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container my-5">
    <h1>Update Category</h1>
    <form action="{{ route('categories.update',$category) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{  old('name',$category->name) }}">
        </div>
        <input type="submit" class="btn btn-primary w-100" value="Update">
    </form>
@endsection

