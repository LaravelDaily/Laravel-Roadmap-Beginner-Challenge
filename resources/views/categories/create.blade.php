@extends('layaouts.master')
@section('titre','creer une category')
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
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{  old('name',$category->name) }}">
        </div>
        <input type="submit" class="btn btn-primary w-100" value="Create">
    </form>
@endsection

