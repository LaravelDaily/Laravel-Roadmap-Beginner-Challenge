@extends('layaouts.master')
@section('titre','Show one Category')
@section('content')
<div class="container my-5">
    <h1>Category : {{ $category->name }}</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-primary float-end">Go back</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts  as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$post) }}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
            @endforeach

    </tbody>
    </table>
    </div>
@endsection
