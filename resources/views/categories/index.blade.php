@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories</div>
                @if(session()->has('message'))
                <div class="alert {{ session()->get('message')['status'] == 'error' ? "alert-danger":"alert-success" }} alert-dismissible fade show mt-10" role="alert">
                    <strong>{{ session()->get('message')['status'] }}!</strong> {{ session()->get('message')['message'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-body">
                   @if(count($categories) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th><th>#</th><th>#</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category) 
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $categories->links() }}
                            </tbody>
                        </table> 
                   @endif
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
