@props(['titre','post','action','method','categories'])
@extends('layaouts.master')
@section('titre','creer un blog')
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
    <h1>{{$titre}} Blog</h1>
    <form action="{{ route('posts.'.$action,$post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($method)
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{  old('title',$post->title) }}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{  old('description',$post->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            @if (!empty($post->image))
                <img src="{{ asset('storage/'.$post->image) }}" width="100px">
            @endif
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Category</label>
            <select name="category_id" id="" class="form-control">
                <option value="">Please select the category of the blog</option>
                @foreach ($categories as $category)
                    <option   @selected($post->category_id == $category->id) class="form-control" value="{{ $category->id }}">  {{ $category->name }} </option>
                @endforeach
            </select>
        </div>

        <input type="submit" class="btn btn-primary w-100" value="{{$titre}}">
    </form>
@endsection
