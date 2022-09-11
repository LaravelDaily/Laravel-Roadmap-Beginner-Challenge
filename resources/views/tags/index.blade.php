@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tags</div>
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
                    <strong>Success !</strong> {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-body">
                   @if(count($tags) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th><th>#</th><th>#</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag) 
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                        <td>
                                            <form action="{{ route('tags.destroy', $tag->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $tags->links() }}
                            </tbody>
                        </table> 
                   @endif
                    <a class="btn btn-success" href="{{ route('tags.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
