@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('includes.sidebar')
            <div class="col py-3">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                <h1>Tags</h1>
                <a href="{{route('tag.create')}}" class="btn btn-primary">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $tag)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->created_at? $tag->created_at->format('d M Y - H:i:s') : "Not Defined"}}</td>
                                <td>
                                    <a href="{{route('tag.edit', $tag->id)}}">Edit</a>
                                    <a href="{{route('tag.show', $tag->id)}}">View</a>
                                    <a href="{{ route('tag.destroy', $tag->id) }}" onclick="event.preventDefault(); document.getElementById('tag-delete').action = '{{ route('tag.destroy', $tag->id) }}'; document.getElementById('tag-delete').submit()">Delete</a>
                                    
                                    <form method="POST" id="tag-delete" action="" class="d-none">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-link">Delete</button>
                                    </form>
                                </td>
                            </tr>  
                        @empty
                            <tr>No data found</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection