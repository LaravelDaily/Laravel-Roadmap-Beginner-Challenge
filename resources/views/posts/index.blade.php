@extends('layaouts.master')
@section('titre','list des blogs')
@section('content')
<div class="container my-5">
    <h1>List des blogs</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success float-end">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Created_at</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts  as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{$post->title}}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        @if (!empty($post->image))
                            <img src="{{  asset('storage/'.$post->image) }}" width="100px">
                        @else
                            <h6>this blog does'int have a image.</h6>
                        @endif

                    </td>
                    <td>
                        @if (!empty($post->category))
                            <span class="badge bg-primary">{{ $post->category->name }}</span>
                        @else
                            -
                        @endif

                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('posts.edit',$post) }}" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy',$post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach

    </tbody>
    </table>
    </div>
@endsection
