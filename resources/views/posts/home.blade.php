@extends('layaouts.master')
@section('titre','Blogs')
@section('content')
    <h1>Last blogs</h1>
    <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4">
    <div class="card my-3">
        <img src="{{asset('storage/'.$post->image)}}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Category: <span class="badge bg-primary">{{$post->category->name}}</span>
            <a href="{{  route('posts.show',$post) }}" class="btn btn-info">Show</a>
        </li>
        </ul>
        <div class="card-footer" style="background-color: #d07d7d36">
            {{$post->created_at}}
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
