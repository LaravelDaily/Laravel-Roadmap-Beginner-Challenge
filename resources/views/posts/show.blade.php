@extends('layaouts.master')
@section('titre','BlogDetail')
@section('content')
<div class="container">
    <h1>Blog</h1>
    <div class="card m-4 p-4 text-center ">
        <img  class="card-img-top w-75 mx-auto " src="{{asset('storage/'.$post->image)}}">
        <div class="card-body">
            <h5 class="card-title">#{{ $post->id }} {{ $post->title }}</h5>
            <p class="card-text"> {{ $post->created_at->format('d-m-y') }} </p>
            <span class="badge bg-success">{{ $post->category->name }}</span>
            <p class="card-text">{{ $post->description }}</p>

        </div>
  </div>
</div>
@endsection
